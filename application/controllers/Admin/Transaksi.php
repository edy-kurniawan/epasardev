<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

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
         $this->load->helper(array('form', 'url','detail')); 
         $this->load->model(array('DbHelper', 'M_user','M_xpenjualan','M_cart')); 

        // $this->load->model('M_login');
    }

    public function index(){
        $this->load->view('Admin/v_transaksi');
    }

}