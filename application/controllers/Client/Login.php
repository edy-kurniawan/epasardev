<?php
class Login extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('M_login');
        $this->load->helper('security');
    }

    function index(){
        $this->load->view('template/client/head2');
        $this->load->view('Client/v_login');
        $this->load->view('template/client/footer');
    }

    function aksi_login(){
        $username = $this->input->post('username');
        $password = $this->input->post('pass');
        $where = array(
            'Username' => $username,
            'Pass' => do_hash($password),
            );
        $cek = $this->M_login->cek_login("login",$where)->num_rows();
        if($cek > 0){
           $query = $this->db->query("SELECT
                                    login.Username,
                                    login.Pass
                                    from login
                                    where login.Username='$username' and login.Status='T'
                                    ");
            $row = $query->row();
            $data_session_user = array(
                'username'  => $username,
                'status'    => "online",
                'logged_user'    => TRUE,
                
            );

            $this->session->set_userdata($data_session_user);
            $this->session->set_flashdata('message', '<div  class="col-md-8 alert-success alert-dismissible" data-dismiss="alert" aria-hidden="true" ><br>
                <i class="icon fa fa-check"></i>
                <strong>Sukses Login</strong>
              </div>');
                redirect('client/home');

        }else{
            $this->session->set_flashdata('error', '<div style="color : red;"><strong>Username atau password salah !</strong></div>');
            redirect('client/login');
        }
    }
    
    function logout(){
        $this->session->unset_userdata('logged_user');
        redirect(base_url('client/home'));
    }

}
?>