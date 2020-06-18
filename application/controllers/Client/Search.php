<?php
class Search extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->helper('security');
        $this->load->helper(array('form', 'url')); 
        $this->load->model(array('DbHelper', 'M_barang','M_kategori','M_cart'));
    }

    function index(){
        $keyword        = $this->input->post('keyword',TRUE);
        $data['search'] = $this->M_barang->search($keyword)->result();
        $refuser        = $this->session->userdata("username");
        $cart['cart']   = $this->M_cart->get_cart($refuser)->result();
        $cart['kat']    = $this->M_kategori->getSemua()->result();
        $this->session->set_flashdata('keyword', $keyword);
        $this->load->view('template/client/head2',$cart);
        $this->load->view('Client/v_search',$data);
        $this->load->view('template/client/footer');
    }

    function redirect(){
        $this->session->set_flashdata('error', '</br><font color="red">
                <i class="icon fa fa-times-circle"></i>
                <strong>silahkan signin terlebih dahulu !</strong></font>
            ');
        redirect('signin');
        
    }

    function cek_login(){
        if ($this->session->userdata['logged_user'] == TRUE)
        {
        
        }
        else
        {
            
        }
    }

}
?>