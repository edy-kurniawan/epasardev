<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ($this->session->userdata['logged'] == TRUE)
        {   }
        else
        {
            $this->session->set_flashdata('message', '<div style="color : red;">Login Terlebih Dahulu</div>');
            redirect(base_url('Login'));
        }
         $this->load->library('form_validation'); 
         $this->load->helper('security');
         $this->load->helper(array('form', 'url','tombol','add')); 
         $this->load->model(array('DbHelper', 'M_barang'));
         $this->load->helper('date'); 
         $this->load->library('upload');
    }

    public function index(){
        $data['ktg']   = $this->DbHelper->getkategori($this->DbHelper->kat, 'Pilih Kategori');
        $this->load->view('Admin/v_barang', html_escape($data));
    }

    public function getcount(){
        $barang     = $this->M_barang->countbarang();
        $aktif      = $this->M_barang->countaktif();
        $non        = $this->M_barang->countnon();
        $kat        = $this->M_barang->countkat();
        echo json_encode(array(
            'jml'    => $barang->jml,
            'aktif'  => $aktif->jml,
            'non'    => $non->jml,
            'kat'    => $kat->jml
            )
        );
    }

    public function setView(){
        $result = $this->M_barang->getSemua()->result();
        $list   = array();
        $No     = 1;
        foreach ($result as $r) {
            if($this->session->userdata("user") == "admin") {
            $row    = array(
                        "no"        => $No,
                        "id"        => html_escape($r->ID),
                        "kode"      => html_escape($r->Kode),
                        "img"       => add(html_escape($r->Img)),
                        "nama"      => html_escape($r->Nama),
                        "harga"     => html_escape(number_format($r->Harga)),
                        "kat"       => html_escape($r->kat),
                        "status"    => html_escape($r->Status),
                        "satuan"    => html_escape($r->Satuan),
                        "ket"       => html_escape($r->Ket),
                        "action"    => tombol(html_escape($r->ID))
            );
        } else {
            $row    = array(
                "no"        => $No,
                "id"        => html_escape($r->ID),
                "kode"      => html_escape($r->Kode),
                "img"       => add(html_escape($r->Img)),
                "nama"      => html_escape($r->Nama),
                "harga"     => html_escape(number_format($r->Harga)),
                "kat"       => html_escape($r->kat),
                "status"    => html_escape($r->Status),
                "satuan"    => html_escape($r->Satuan),
                "ket"       => html_escape($r->Ket),
                "action"    => tombol()
            );
        }

            $list[] = $row;
            $No++;
        }   

        echo json_encode(array('data' => $list));
    }

    public function ajax_delete($id)
    {
        $barang= $this->M_barang->edit($id);
        if($barang->Img=="default.jpg")
        {

        }else {
            if(file_exists('./assets/upload/barang/'.$barang->Img) && $barang->Img)
            unlink('./assets/upload/barang/'.$barang->Img);
            if(file_exists('./assets/upload/temp/'.$barang->Img) && $barang->Img)
            unlink('./assets/upload/temp/'.$barang->Img);
        }
        $this->M_barang->delete_by_kode($id);
        echo json_encode(array("status" => TRUE));
    }
   
       public function ajax_edit($id)
    {
        $data = $this->M_barang->edit($id);
        echo json_encode($data);
    }

    function ajax_update(){
        
        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');

        $this->form_validation->set_rules('kode','kode','trim|required');
        $this->form_validation->set_rules('nama','nama','trim|required');
        $this->form_validation->set_rules('harga','harga','trim|required|is_natural_no_zero');
        $this->form_validation->set_rules('status','status','trim|required');
        $this->form_validation->set_rules('satuan','satuan','trim|required');
        $this->form_validation->set_rules('kat','kat','trim|required');

        if($this->form_validation->run() == false)
        {
            
        }
        else
        {
        
        $id = $this->security->sanitize_filename($this->input->post('id'));
        $kode = $this->security->sanitize_filename($this->input->post('kode'));
        $nama = $this->security->sanitize_filename($this->input->post('nama'));
        $harga = $this->security->sanitize_filename($this->input->post('harga'));
        $refkat = $this->security->sanitize_filename($this->input->post('kat'));
        $status = $this->security->sanitize_filename($this->input->post('status'));
        $ket = $this->security->sanitize_filename($this->input->post('ket'));

 
        $data = array(
            "Kode"          => $kode,
            "Nama"          => $nama,
            "Harga"         => $harga,
            "Refkategori"   => $refkat,
            "Status"        => $status,
            "Ket"           => $ket,
            "Dateu"         => $now
            );

            $where = array(
            'ID' => $id
    );

        //Update img
        if($this->input->post('remove_photo')) // if remove photo checked 
        {
            if($this->input->post('remove_photo')=="default.jpg"){

            }else{
                if(file_exists('./assets/upload/barang/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo'))
                unlink('./assets/upload/barang/'.$this->input->post('remove_photo'));
            }
            $data['Img'] = 'default.jpg'; 
        }
 
        if(!empty($_FILES['photo']['name']))
        {
            $upload = $this->_do_upload();
            //delete file
            $barang= $this->M_barang->edit($id);
            if($barang->Img=="default.jpg"){

            }else{
            if(file_exists('./assets/upload/barang/'.$barang->Img) && $barang->Img)
            unlink('./assets/upload/barang/'.$barang->Img);
            }
            //delete temp
            if(file_exists('./assets/upload/temp/'.$barang->Img) && $barang->Img)
            unlink('./assets/upload/temp/'.$barang->Img);
 
            $data['Img'] = $upload;
            //delete new temp
            if(file_exists('./assets/upload/temp/'.$data['Img']) &&  $data['Img'])
            unlink('./assets/upload/temp/'.$data['Img']);
        } 
 
        $this->M_barang->update($where,$data);
        echo json_encode(array("status" => TRUE));
    }

}

    public function ajax_add()
    { 
        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');

        $this->form_validation->set_rules('kode','kode','trim|required');
        $this->form_validation->set_rules('nama','nama','trim|required');
        $this->form_validation->set_rules('harga','harga','trim|required|is_natural_no_zero');
        $this->form_validation->set_rules('status','status','trim|required');
        $this->form_validation->set_rules('satuan','satuan','trim|required');
        $this->form_validation->set_rules('kat','kat','trim|required');

        if($this->form_validation->run() == false)
        {
            
        }
        else
        {

        $kode = $this->security->sanitize_filename($this->input->post('kode'));
        $nama = $this->security->sanitize_filename($this->input->post('nama'));
        $harga = $this->security->sanitize_filename($this->input->post('harga'));
        $refkat = $this->security->sanitize_filename($this->input->post('kat'));
        $status = $this->security->sanitize_filename($this->input->post('status'));
        $satuan = $this->security->sanitize_filename($this->input->post('satuan'));
        $ket = $this->security->sanitize_filename($this->input->post('ket'));
 
        $data = array(
            'Kode'          => $kode,
            'Nama'          => $nama,
            'Harga'         => $harga,
            'Refkategori'   => $refkat,
            'Status'        => $status,
            'Satuan'        => $satuan,
            'Ket'           => $ket,
            'Datei'         => $now
                    );
 
        if(!empty($_FILES['photo']['name']))
            {
                $upload = $this->_do_upload();
                $data['Img'] = $upload;
            } else {
                $data['Img'] = "default.jpg";
            }
        
        $this->M_barang->inputdata($data,'barang');
        echo json_encode(array("status" => TRUE));
        }
    }
    
    function _do_upload(){
        $config['upload_path']   = './assets/upload/temp/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name']  = TRUE; //Enkripsi nama yang terupload
 
        $this->upload->initialize($config);
        if(!empty($_FILES['photo']['name'])){
 
            if ($this->upload->do_upload('photo')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/upload/temp/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '100%';
                $config['width']= 400;
                $config['height']= 400;
                $config['new_image']= './assets/upload/barang/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
 
                $gambar=$gbr['file_name'];
                return $gambar;
            }
                      
        }else{
            $data['inputerror'][] = 'photo';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
                 
    }

   /*  private function _do_upload()
    {
        $config['upload_path']          = './assets/upload/barang/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000; //set max size allowed in Kilobyte
        $config['max_width']            = 1000; // set max width image allowed
        $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
 
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
 
        if(!$this->upload->do_upload('photo')) //upload and validate
        {
            $data['inputerror'][] = 'photo';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    } */
}
