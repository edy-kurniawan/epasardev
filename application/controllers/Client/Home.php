<?php
class Home extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->helper('security');
        $this->load->helper(array('form', 'url')); 
        $this->load->model(array('DbHelper', 'M_barang'));
    }

    function index(){
        $data['barang']=$this->M_barang->showbarang()->result();
        $this->load->view('Client/home',$data);
    }

    function add_cart($id=null){
        if ($this->session->userdata['logged_user'] == TRUE)
        {
            $data = $this->M_barang->add_cart($id);
            echo json_encode($data);
        }
        else
        {
            $this->session->set_flashdata('error', '</br><font color="red">
                <i class="icon fa fa-times-circle"></i>
                <strong>silahkan signin terlebih dahulu !</strong></font>
            ');
        redirect('signin');
        }
        
    }



}
?>