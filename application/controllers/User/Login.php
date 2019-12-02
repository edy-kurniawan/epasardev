<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ($this->session->userdata['logged'] == TRUE)
        { }
        else
        {
            $this->session->set_flashdata('message', '<div style="color : red;">Login Terlebih Dahulu</div>');
            redirect(base_url('login'));
        }
         $this->load->helper(array('form', 'url','tombol')); 
         $this->load->model(array('DbHelper', 'M_login')); 
         $this->load->library('form_validation'); 

    }

    public function index(){
        $this->load->view('user/v_login');
    }

 public function setView(){
        $result = $this->M_login->getSemua()->result();
        $list   = array();
        $No     = 1;
        foreach ($result as $r) {
            $row    = array(
                        "no"        => $No,
                        "id"       => $r->ID,
                        "username"       => $r->Username,
                        "pass"        => $r->Pass,
                        "refuser"    => $r->Refuser,
                        "refcart"    => $r->Refcart,
                        "status"        => $r->Status,
                        "nama"    => $r->Nama,
                        "keranjang"    => $r->Keranjang,
                        "action"     => tombol($r->ID)
            );

            $list[] = $row;
            $No++;
        }   

        echo json_encode(array('data' => $list));
    }

    public function ajax_delete($id)
    {
        $this->M_login->delete_by_kode($id);
        echo json_encode(array("status" => TRUE));
    }

    function ajax_add(){

        $username = $this->input->post('username');
        $pass = $this->input->post('pass');
        $refuser = $this->input->post('refuser');
        $status = $this->input->post('status');
        $refcart = $this->input->post('refcart');
 
        $data = array(
            "Kode"       => $kode,
            "Nama"       => $nama,
            "Refuser"    => $refuser,
            "Status"     => $status,
            "Refcart"     => $refcart
            );

        $this->M_login->inputdata($data,'login');
        echo json_encode(array("status" => TRUE));    
           
    }
    
       public function ajax_edit($id)
    {
        $data = $this->M_login->edit($id);
        echo json_encode($data);
    }

    function ajax_update(){
        
        $id = $this->input->post('id');
        $kode = $this->input->post('kode');
        $nama = $this->input->post('nama');
        $ket = $this->input->post('ket');

    $data = array(  
        "Kode"       => $kode,
        "Nama"       => $nama,
        "Ket"       => $ket
            );

        $where = array(
        'ID' => $id
    );
 
        $this->M_login->update($where,$data);
        echo json_encode(array("status" => TRUE));

}

 
   
	
}
