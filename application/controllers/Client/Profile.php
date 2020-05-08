<?php
class Profile extends CI_Controller{

    function __construct(){
        parent::__construct();
         $this->load->helper(array('form', 'url')); 
         $this->load->model(array('DbHelper', 'M_user', 'M_login')); 
         $this->load->library(array('form_validation','session'));
         $this->load->helper('security');
    }

    function index(){
        $this->load->view('template/client/head2');
        $this->load->view('Client/v_profile');
        $this->load->view('template/client/footer');
    }
}
?>