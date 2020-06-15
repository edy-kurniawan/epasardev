<?php
class Home_nologin extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->helper('security');
        $this->load->helper(array('form', 'url')); 
        $this->load->model(array('DbHelper', 'M_barang','M_kategori'));
    }

    function index(){
        $data['barang'] = $this->M_barang->showbarang()->result();
        $cart['kat']    = $this->M_kategori->getSemua()->result();
        $this->load->view('template/client/head_nologin',$cart);
        $this->load->view('Client/v_home',$data);
    }

    function redirect(){
        $this->session->set_flashdata('error', '</br><font color="red">
                <i class="icon fa fa-times-circle"></i>
                <strong>silahkan signin terlebih dahulu !</strong></font>
            ');
        redirect('signin');
        
    }

}
?>