<?php
class Register extends CI_Controller{

    function __construct(){
        parent::__construct();
         $this->load->helper(array('form', 'url')); 
         $this->load->model(array('DbHelper', 'M_user', 'M_login','M_kategori','M_cart')); 
         $this->load->library(array('form_validation','session'));
         $this->load->helper('security');
    }

    function index(){
        $refuser        = $this->session->userdata("username");
        $data['cart']   = $this->M_cart->get_cart($refuser)->result();
        $data['kat']    = $this->M_kategori->getSemua()->result();
        $this->load->view('template/client/head2',$data);
        $this->load->view('Client/v_register');
        $this->load->view('template/client/footer');
    }

    function register(){

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_email_exists');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

        if($this->form_validation->run() === FALSE){
             
            $this->session->set_flashdata('message', '</br><font color="red">
                <i class="icon fa fa-times-circle"></i>
                <strong>Gagal membuat akun, Masukan Data Dengan Benar !</strong></font>
            ');
            
        $this->load->view('template/client/head2');
        $this->load->view('Client/v_register');
        $this->load->view('template/client/footer');

        } else {

        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');

        $username = $this->security->sanitize_filename($this->input->post('username'));
        $nama = $this->security->sanitize_filename($this->input->post('nama'));
        $email = $this->security->sanitize_filename($this->input->post('email'));
        $telp = $this->security->sanitize_filename($this->input->post('telp'));
        $pass = $this->security->sanitize_filename($this->input->post('password'));
 
        $data = array(
            "Username"       => $username,
            "Pass"           => do_hash($pass),
            "Status"         => 'T'
            );

        $data2 = array(
            "Nama"       => $nama,
            "Refuser"    => $username,
            "Email"      => $email,
            "Telp"       => $telp,
            "Img"        => "default.png",
            "Datei"      => $now
            );

        $this->M_login->inputdata($data,'login');
        $this->M_user->inputdata($data2,'user');   

        $this->session->set_flashdata('message', '<br><font color="green">
                <i class="icon fa fa-check"></i>
                <strong>Akun Berhasil Dibuat !</strong></font>
              ');

        redirect('signin');
            }
           
    }

    // Check if username exists
    public function check_username_exists($username){
        $this->form_validation->set_message('check_username_exists', 'Username Sudah terdaftar. Silahkan gunakan username lain');
        if($this->M_user->check_username_exists($username)){
            return true;
        } else {
            return false;
        }
    }

    // Check if email exists
    public function check_email_exists($email){
        $this->form_validation->set_message('check_email_exists', 'Email Sudah terdaftar. Silahkan gunakan email lain');
        if($this->M_user->check_email_exists($email)){
            return true;
        } else {
            return false;
        }
    }
}
?>