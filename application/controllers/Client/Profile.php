<?php
class Profile extends CI_Controller{

    function __construct(){
        parent::__construct();
        if ($this->session->userdata['logged_user'] == TRUE)
        {
        
        }
        else
        {
            $this->session->set_flashdata('error', '</br><div style="color : red;">Login Terlebih Dahulu</div>');
            redirect(base_url('signin'));
        }

         $this->load->helper(array('form', 'url')); 
         $this->load->model(array('DbHelper', 'M_profile','M_login','M_cart','M_kategori')); 
         $this->load->library(array('form_validation','session'));
         $this->load->helper('security');
    }

    function index(){
        $refuser        = $this->session->userdata("username");
        $cart['kat']    = $this->M_kategori->getSemua()->result();
        $cart['cart']   = $this->M_cart->get_cart($refuser)->result();
        $data['prov']   = $this->M_profile->get_prov()->result();
        $this->load->view('template/client/head2',$cart);
        $this->load->view('Client/v_profile', $data);
    }

    function get_user(){
        $username   = $this->session->userdata("username");
        $data       = $this->M_profile->get_data($username);
        echo json_encode($data);
    }

    public function ajax_edit()
    {
        $refuser    = $this->session->userdata("username");
        $data       = $this->M_barang->edit($refuser);
        echo json_encode($data);
    }

    function ajax_update(){
        $this->form_validation->set_rules('nama','nama','required');
        $this->form_validation->set_rules('telp','telp','required|min_length[8]|max_length[14]');
        $this->form_validation->set_rules('tgl','tgl','required');
        $this->form_validation->set_rules('jenis','jenis','required|in_list[0,1]');
        $this->form_validation->set_rules('prov','prov','required|is_natural');
        $this->form_validation->set_rules('kab','kab','required|is_natural');
        $this->form_validation->set_rules('kec','kec','required|is_natural');
        $this->form_validation->set_rules('kel','kel','required|is_natural');
        $this->form_validation->set_rules('alamat2','alamat2','required');
        
            if($this->form_validation->run() == false)
        {
            redirect('user');
        }
            else
        {
        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now    = date('Y-m-d H:i:s');
        $id     = $this->security->sanitize_filename($this->input->post('id'));
        $nama   = $this->security->sanitize_filename($this->input->post('nama'));
        $telp   = $this->security->sanitize_filename($this->input->post('telp'));
        $jenis  = $this->security->sanitize_filename($this->input->post('jenis'));
        $tgl    = $this->security->sanitize_filename($this->input->post('tgl'));
        $prov   = $this->security->sanitize_filename($this->input->post('prov'));
        $kab    = $this->security->sanitize_filename($this->input->post('kab'));
        $kec    = $this->security->sanitize_filename($this->input->post('kec'));
        $kel    = $this->security->sanitize_filename($this->input->post('kel'));
        $alamat = $this->security->sanitize_filename($this->input->post('alamat2'));

        $data = array(  
            "Nama"       => $nama,
            "Telp"       => $telp,
            "Jenis"      => $jenis,
            "Tgllahir"   => $tgl,
            "Prov"       => $prov,
            "Kab"        => $kab,
            "Kec"        => $kec,
            "Kel"        => $kel,
            "Alamat"     => $alamat,
            "Dateu"      => $now
            );

            $where = array(
            'ID' => $id
            );
 
        $this->M_profile->update($where,$data);

        $this->session->set_flashdata('message', '<br><font color="green">
                <i class="icon fa fa-check"></i>
                <strong>Data Berhasil Diupdate !</strong></font>
              ');

        redirect('user');
            
        }
    }

    function img_update(){
       
        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s'); 
        $id = $this->security->sanitize_filename($this->input->post('id'));

            if(!empty($_FILES['photo']['name']))
            {
                $data = array(  
                    "Dateu"      => $now
                    );

                    $where = array(
                    'ID' => $id
                    );
                $upload = $this->_do_upload();
                $data['Img'] = $upload;

                $this->M_profile->update($where,$data);
                echo json_encode(array("status" => TRUE));
                
                if($this->input->post('img')=="default.png"){

                }else{
                    if(file_exists('./assets/upload/user/'.$this->input->post('img')) && $this->input->post('img'))
                    unlink('./assets/upload/user/'.$this->input->post('img'));
                }

                redirect('Client/Profile'); 
            } else {
                if($this->input->post('remove_photo')) // if remove photo checked 
            {
                if(file_exists('./assets/upload/user/'.$this->input->post('img')) && $this->input->post('img'))
                unlink('./assets/upload/user/'.$this->input->post('img'));
                $data = array(  
                    "Img"      => "default.png",
                    "Dateu"      => $now
                    );

                    $where = array(
                    'ID' => $id
                    );
                
                $this->M_profile->update($where,$data);
                echo json_encode(array("status" => TRUE));
                redirect('user'); 
            }
                redirect('user'); 
            }

    }

    private function _do_upload()
    {
        $config['upload_path']          = './assets/upload/user/';
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
    }

    function pass_update(){
        $this->form_validation->set_rules('pass', 'pass', 'required|min_length[3]');
        $this->form_validation->set_rules('pass2', 'pass2', 'matches[pass]');

        if($this->form_validation->run() === FALSE){
            
            echo json_encode(array("status" => FALSE));    
            $this->session->set_flashdata('message', '</br><font color="red">
                <i class="icon fa fa-times-circle"></i>
                <strong>Gagal update password, Masukan Data Dengan Benar !</strong></font>
            ');
        
            redirect('Client/Profile'); 

        } else {

        $refuser    = $this->session->userdata("username");
        $password   = $this->input->post('oldpass');
        $newpass    = $this->input->post('pass');

        $where = array(
            'Username' => $refuser,
            'Pass'     => do_hash($password),
            );

        $cek = $this->M_login->cek_login("login",$where)->num_rows();
        if($cek > 0){
           
            $data = array(  
                "Pass"      => do_hash($newpass)
                );
    
                $where = array(
                'Username' => $refuser
                );
     
            $this->M_login->update($where,$data);
            echo json_encode(array("status" => TRUE));
    
            $this->session->set_flashdata('message', '<br><font color="green">
                    <i class="icon fa fa-check"></i>
                    <strong>Password Berhasil Diubah !</strong></font>
                  ');
            redirect('user');

        }else{
            $this->session->set_flashdata('message', '<div style="color : red;"><strong>Password salah !</strong></div>');
            redirect('user');
        }
        }
    }

    function get_kab(){
        $id   = $this->input->post('id',TRUE);
        $data = $this->M_profile->get_kab($id)->result();
        echo json_encode($data);
    }

    function get_kec(){
        $id   = $this->input->post('id',TRUE);
        $data = $this->M_profile->get_kec($id)->result();
        echo json_encode($data);
    }
    
    function get_kel(){
        $id   = $this->input->post('id',TRUE);
        $data = $this->M_profile->get_kel($id)->result();
        echo json_encode($data);
    }

    function count_cart(){
        $refuser    = $this->session->userdata("username");
        $data       = $this->M_cart->count_cart($refuser);
        echo json_encode($data);
    }
}
?>