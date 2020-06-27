<?php

class Login extends CI_Controller{

    function __construct(){
        parent::__construct();

        $this->load->model('M_admin');
        $this->load->helper('security');

    }

    function index(){
        $this->load->view('v_login');
    }

    function aksi_login(){
        $username = $this->security->sanitize_filename($this->input->post('nama_user'));
        $password = $this->security->sanitize_filename($this->input->post('pass'));
        $where = array(
            'Username' => $username,
            'Pass' => do_hash($password),
            );
        $cek = $this->M_admin->cek_login("admin",$where)->num_rows();
        if($cek > 0){
           $query = $this->db->query("SELECT
                                    admin.Username,
                                    admin.Pass
                                    from admin
                                    where admin.Username='$username'
                                    ");
            $row = $query->row();
            $data_session = array(
                'user'      => $username,
                'status'    => "online",
                'logged'    => TRUE,
                
            );

            $this->session->set_userdata($data_session);

            $this->session->set_flashdata('message', '<div  class="col-md-3 alrt-success alert-dismissible" data-dismiss="alert" aria-hidden="true" >
                <i class="icon fa fa-check"></i>
                Login Sukses
              </div>');
                redirect('dashboard');

        }else{
            $this->session->set_flashdata('message', '<div style="color : red;">Username dan password Tidak Ditemukan</div>');
            redirect('login');
        }
    }
    
    function logout(){
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}
