<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
         $this->load->model(array('DbHelper', 'M_user')); 
    

        // $this->load->model('M_login');
    }

    public function index(){
        $this->load->view('Admin/v_user');
    }

    public function getcount(){
        $user   = $this->M_user->totaluser();
        $aktif  = $this->M_user->useraktif();
        $non    = $this->M_user->usernonaktif();
        $pasif  = $this->M_user->userpasif();
        echo json_encode(array(
            'jml'    => $user->jml,
            'aktif'  => $aktif->jml,
            'non'    => $non->jml,
            'pasif'  => $pasif->jml,
            )
        );
    }

    public function setView(){
        $result = $this->M_user->getSemua()->result();
        $list   = array();
        $No     = 1;
        foreach ($result as $r) {
            $row    = array(
                        "no"        => $No,
                        "id"        => html_escape($r->ID),
                        "username"  => html_escape($r->Username),
                        "nama"      => html_escape($r->Nama),
                        "jenis"     => html_escape($r->Jenis),
                        "alamat"    => html_escape($r->Alamat),
                        "tgllahir"  => html_escape($r->Tgllahir),
                        "telp"      => html_escape($r->Telp),
                        "email"     => html_escape($r->Email),
                        "action"    => detail(html_escape($r->ID))
            );

            $list[] = $row;
            $No++;
        }   

        echo json_encode(array('data' => $list));
    }

    public function cart($id){
        $id = $this->input->post('id');
        $result = $this->M_user->getcart($id)->result();
        $list   = array();
        $No     = 1;
        foreach ($result as $r) {
            $row    = array(
                        "no"        => $No,
                        "id"        => $r->ID,
                        "nama"      => $r->Nama,
                        "jml"       => $r->Jumlah,
                        "subtotal"  => $r->Subtotal
            );

            $list[] = $row;
            $No++;
        }   

        echo json_encode(array('data' => $list));
    }

     public function ajax_edit($id)
    {
        $data = $this->M_user->edit($id);
        echo json_encode($data);
    }
	
}
