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
            redirect(base_url('login'));
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
        $data['toko']   = $this->DbHelper->gettoko($this->DbHelper->toko, 'Pilih Toko');
        $this->load->view('admin/v_barang', $data);
    }

    public function getcount(){
        $barang   = $this->M_barang->countbarang();
        $aktif   = $this->M_barang->countaktif();
        $non   = $this->M_barang->countnon();
        $kat   = $this->M_barang->countkat();
        echo json_encode(array(
            'jml'    => $barang->jml,
            'aktif'    => $aktif->jml,
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
            $row    = array(
                        "no"        => $No,
                        "id"       => $r->ID,
                        "kode"       => $r->Kode,
                        "img"       => add($r->Img),
                        "nama"    => $r->Nama,
                        "toko"    => $r->toko,
                        "harga"      => $r->Harga,
                        "stok"       => $r->Stok,
                        "kat"    => $r->kat,
                        "status"      => $r->Status,
                        "satuan"      => $r->Satuan,
                        "ket"      => $r->Ket,
                        "action"     => tombol($r->ID)
            );

            $list[] = $row;
            $No++;
        }   

        echo json_encode(array('data' => $list));
    }

    public function ajax_delete($id)
    {
        $barang= $this->M_barang->edit($id);
        if(file_exists('./assets/upload/barang/'.$barang->Img) && $barang->Img)
        unlink('./assets/upload/barang/'.$barang->Img);
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
        $this->form_validation->set_rules('toko','toko','trim');
        $this->form_validation->set_rules('stok','stok','trim|required');
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
        $reftoko = $this->security->sanitize_filename($this->input->post('toko'));
        $nama = $this->security->sanitize_filename($this->input->post('nama'));
        $harga = $this->security->sanitize_filename($this->input->post('harga'));
        $stok = $this->security->sanitize_filename($this->input->post('stok'));
        $refkat = $this->security->sanitize_filename($this->input->post('kat'));
        $status = $this->security->sanitize_filename($this->input->post('status'));
        $ket = $this->security->sanitize_filename($this->input->post('ket'));

 
        $data = array(
            "Kode"       => $kode,
            "Nama"    => $nama,
            "Reftoko"    => $reftoko,
            "Harga"      => $harga,
            "Stok"       => $stok,
            "Refkategori"    => $refkat,
            "Status"      => $status,
            "Ket"    => $ket,
            "Dateu"      => $now
            );

            $where = array(
            'ID' => $id
    );

        //Update img
        if($this->input->post('remove_photo')) // if remove photo checked
        {
            if(file_exists('./assets/upload/barang/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo'))
                unlink('./assets/upload/barang/'.$this->input->post('remove_photo'));
            $data['Img'] = '';
        }
 
        if(!empty($_FILES['photo']['name']))
        {
            $upload = $this->_do_upload();
             
            //delete file
            $barang= $this->M_barang->edit($id);
            if(file_exists('./assets/upload/barang/'.$barang->Img) && $barang->Img)
            unlink('./assets/upload/barang/'.$barang->Img);
 
            $data['Img'] = $upload;
        } 
 
        $this->M_barang->update($where,$data);
        echo json_encode(array("status" => TRUE));
    }

}

    public function ajax_add()
    { 
        $kode = $this->security->sanitize_filename($this->input->post('kode'));
        $reftoko = $this->security->sanitize_filename($this->input->post('toko'));
        $nama = $this->security->sanitize_filename($this->input->post('nama'));
        $harga = $this->security->sanitize_filename($this->input->post('harga'));
        $stok = $this->security->sanitize_filename($this->input->post('stok'));
        $refkat = $this->security->sanitize_filename($this->input->post('kat'));
        $status = $this->security->sanitize_filename($this->input->post('status'));
        $satuan = $this->security->sanitize_filename($this->input->post('satuan'));
        $ket = $this->security->sanitize_filename($this->input->post('ket'));
 
        $data = array(
            'Kode'       => $kode,
            'Nama'       => $nama,
            'Reftoko'    => $reftoko,
            'Harga'      => $harga,
            'Stok'       => $stok,
            'Refkategori'    => $refkat,
            'Status'      => $status,
            'Satuan'      => $satuan,
            'Ket'        => $ket
                    );
 
         if(!empty($_FILES['photo']['name']))
            {
                $upload = $this->_do_upload();
                $data['Img'] = $upload;
            }
 
        $this->M_barang->inputdata($data,'barang');
        echo json_encode(array("status" => TRUE));
    }

    private function _do_upload()
    {
        $config['upload_path']          = './assets/upload/barang/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100; //set max size allowed in Kilobyte
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
    }
    
}
