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

}
?>