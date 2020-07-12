<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ($this->session->userdata['logged'] == TRUE)
        { }
        else
        {
            $this->session->set_flashdata('message', '<div style="color : red;">Login Terlebih Dahulu</div>');
            redirect(base_url('Login'));
        }
         $this->load->helper(array('form', 'url','tombol')); 
         $this->load->model(array('DbHelper', 'M_kategori')); 
         $this->load->library('form_validation'); 
         $this->load->helper('security');

    }

    public function index(){
        $this->load->view('Admin/v_penjualan');
    }

    public function setView(){
        $result = $this->M_kategori->getSemua()->result();
        $list   = array();
        $No     = 1;
        foreach ($result as $r) {
            $row    = array(
                        "no"        => $No,
                        "id"        => html_escape($r->ID),
                        "kode"      => html_escape($r->Kode),
                        "nama"      => html_escape($r->Nama),
                        "ket"       => html_escape($r->Ket),
                        "action"    => tombol(html_escape($r->ID))
            );

            $list[] = $row;
            $No++;
        }   

        echo json_encode(array('data' => $list));
    }

    public function ajax_delete($id)
    {
        $this->M_kategori->delete_by_kode($id);
        echo json_encode(array("status" => TRUE));
    }

    function ajax_add(){

        $this->form_validation->set_rules('kode','kode','trim|required');
        $this->form_validation->set_rules('nama','nama','trim|required|min_length[4]');
        $this->form_validation->set_rules('ket','ket','trim');

        if($this->form_validation->run() == false)
        {
            
        }
        else
        {
        
        $kode = $this->security->sanitize_filename($this->input->post('kode'));
        $nama = $this->security->sanitize_filename($this->input->post('nama'));
        $ket = $this->security->sanitize_filename($this->input->post('ket'));
 
        $data = array(
            "Kode"       => $kode,
            "Nama"       => $nama,
            "Ket"       => $ket
            );

        $this->M_kategori->inputdata($data,'kategori');
        echo json_encode(array("status" => TRUE));    
        }  
    }
    
       public function ajax_edit($id)
    {
        $data = $this->M_kategori->edit($id);
        echo json_encode($data);
    }

    function ajax_update(){
        
        $this->form_validation->set_rules('kode','kode','trim|required');
        $this->form_validation->set_rules('nama','nama','trim|required|min_length[4]');
        $this->form_validation->set_rules('ket','ket','trim');

        if($this->form_validation->run() == false)
        {
            
        }
        else
        {

        $id = $this->security->sanitize_filename($this->input->post('id'));
        $kode = $this->security->sanitize_filename($this->input->post('kode'));
        $nama = $this->security->sanitize_filename($this->input->post('nama'));
        $ket = $this->security->sanitize_filename($this->input->post('ket'));

    $data = array(  
        "Kode"       => $kode,
        "Nama"       => $nama,
        "Ket"       => $ket
            );

        $where = array(
        'ID' => $id
        );
 
        $this->M_kategori->update($where,$data);
        echo json_encode(array("status" => TRUE));
        }
    }

    public function getcount(){
        $user   = $this->M_kategori->count_sembako();
        $aktif  = $this->M_kategori->count_daging();
        $non    = $this->M_kategori->count_else();
        $pasif  = $this->M_kategori->total();
        echo json_encode(array(
            'sembako'    => $user->jml,
            'daging'  => $aktif->jml,
            'else'    => $non->jml,
            'total'  => $pasif->jml,
            )
        );
    }

}
