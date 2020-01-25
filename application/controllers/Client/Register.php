<?php
class Register extends CI_Controller{

    function __construct(){
        parent::__construct();
         $this->load->helper(array('form', 'url')); 
         $this->load->model(array('DbHelper', 'M_user', 'M_login')); 
         $this->load->library('form_validation'); 
         $this->load->helper('security');
    }

    function index(){
        $this->load->view('template/client/head2');
        $this->load->view('Client/v_register');
        $this->load->view('template/client/footer');
    }

    function register(){

        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');

        $username = $this->security->sanitize_filename($this->input->post('username'));
        $nama = $this->security->sanitize_filename($this->input->post('nama'));
        $email = $this->security->sanitize_filename($this->input->post('email'));
        $telp = $this->security->sanitize_filename($this->input->post('telp'));
        $pass = $this->security->sanitize_filename($this->input->post('pass'));
 
        $data = array(
            "Username"       => $username,
            "Pass"       => do_hash($pass),
            "Status"       => 'T'
            );

        $data2 = array(
            "Nama"       => $nama,
            "Username"       => $username,
            "Email"       => $email,
            "Telp"       => $telp,
            "Datei"      => $now
            );

        $this->M_login->inputdata($data,'login');
        $this->M_user->inputdata($data2,'user');
        echo json_encode(array("status" => TRUE));    

        $this->session->set_flashdata('message', '<br>
                <i class="icon fa fa-check"></i>
                <strong>Akun Berhasil Dibuat !</strong>
              ');

        redirect('client/login');
           
    }
}
?>