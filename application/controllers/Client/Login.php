<?php
class Login extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('M_login');
        $this->load->model('M_kategori');
        $this->load->model('M_cart');
        $this->load->helper('security');
    }

    function index(){
        $refuser        = $this->session->userdata("username");
        $data['cart']   = $this->M_cart->get_cart($refuser)->result();
        $data['kat']    = $this->M_kategori->getSemua()->result();
        $this->load->view('template/client/head2',$data);
        $this->load->view('Client/v_login');
        $this->load->view('template/client/footer');
    }

    function aksi_login(){
        $username = $this->security->sanitize_filename($this->input->post('username'));
        $password = $this->security->sanitize_filename($this->input->post('pass'));
        $where = array(
            'Username' => $username,
            'Pass'     => do_hash($password),
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
            
            date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
            $now = date('Y-m-d H:i:s');
            $data = array(  
                "Onlast" => $now
                    );
            $where = array(
                'Username' => $username
                );
            $this->M_login->update($where,$data);

            $this->session->set_userdata($data_session_user);
            $this->session->set_flashdata('message', '<div  class="col-md-8 alert-success alert-dismissible" data-dismiss="alert" aria-hidden="true" ><br>
                <i class="icon fa fa-check"></i>
                <strong>Sukses Login</strong>
              </div>');
                redirect(base_url());

        }else{
            $this->session->set_flashdata('error', '<div style="color : red;"><strong>Username atau password salah !</strong></div>');
            redirect('signin');
        }
    }
    
    function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }

}
?>