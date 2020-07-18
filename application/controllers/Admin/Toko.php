<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko extends CI_Controller {

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
         $this->load->helper(array('form', 'url','tombol')); 
         $this->load->model(array('DbHelper', 'M_toko')); 
    
    }

    public function index(){
        $this->load->view('Admin/v_toko');
    }

    public function getcount(){
        $toko  = $this->M_toko->counttoko();
        $aktif = $this->M_toko->tokoaktif();
        $non   = $this->M_toko->tokononaktif();
        echo json_encode(array(
            'jml'    => $toko->jml,
            'aktif'  => $aktif->jml,
            'non'    => $non->jml
            )
        );
    }

    public function setView(){
        $result = $this->M_toko->getSemua()->result();
        $list   = array();
        $No     = 1;
        foreach ($result as $r) {
            if($this->session->userdata("user") == "admin") {
            $row    = array(
                        "no"        => $No,
                        "id"        => html_escape($r->ID),
                        "kode"      => html_escape($r->Kode),
                        "nama"      => html_escape($r->Nama),
                        "pemilik"   => html_escape($r->Pemilik),
                        "ket"       => html_escape($r->Ket),
                        "lokasi"    => html_escape($r->Lokasi),
                        "telp"      => html_escape($r->Telp),
                        "jambuka"   => html_escape($r->Jambuka),
                        "jamtutup"  => html_escape($r->Jamtutup),
                        "status"    => html_escape($r->Status),
                        "ket"       => html_escape($r->Ket),
                        "action"    => tombol(html_escape($r->ID))
            );
        } else {
            $row    = array(
                "no"        => $No,
                "id"        => html_escape($r->ID),
                "kode"      => html_escape($r->Kode),
                "nama"      => html_escape($r->Nama),
                "pemilik"   => html_escape($r->Pemilik),
                "ket"       => html_escape($r->Ket),
                "lokasi"    => html_escape($r->Lokasi),
                "telp"      => html_escape($r->Telp),
                "jambuka"   => html_escape($r->Jambuka),
                "jamtutup"  => html_escape($r->Jamtutup),
                "status"    => html_escape($r->Status),
                "ket"       => html_escape($r->Ket),
                "action"    => tombol()
            );
        }

            $list[] = $row;
            $No++;
        }   

        echo json_encode(array('data' => $list));
    }

    public function ajax_delete($id)
    {
        $this->M_toko->delete_by_kode($id);
        echo json_encode(array("status" => TRUE));
    }

    function ajax_add(){

        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');

        $this->form_validation->set_rules('kode','kode','trim|required');
        $this->form_validation->set_rules('nama','nama','trim|required');
        $this->form_validation->set_rules('lokasi','lokasi','trim|required');
        $this->form_validation->set_rules('pemilik','pemilik','trim|required');
        $this->form_validation->set_rules('status','status','trim|required|in_list[T,F]');

        if($this->form_validation->run() == false)
        {
            
        }
        else
        {

        $kode = $this->security->sanitize_filename($this->input->post('kode'));
        $lokasi = $this->security->sanitize_filename($this->input->post('lokasi'));
        $nama = $this->security->sanitize_filename($this->input->post('nama'));
        $pemilik = $this->security->sanitize_filename($this->input->post('pemilik'));
        $telp = $this->security->sanitize_filename($this->input->post('telp'));
        $jambuka = $this->security->sanitize_filename($this->input->post('jambuka'));
        $jamtutup = $this->security->sanitize_filename($this->input->post('jamtutup'));
        $status = $this->security->sanitize_filename($this->input->post('status'));
        $ket = $this->security->sanitize_filename($this->input->post('ket'));

 
        $data = array(
            "Kode"      => $kode,
            "Nama"      => $nama,
            "Pemilik"   => $pemilik,
            "Ket"       => $ket,
            "Lokasi"    => $lokasi,
            "Telp"      => $telp,
            "Jambuka"   => $jambuka,
            "Jamtutup"  => $jamtutup,
            "Status"    => $status,
            "Ket"       => $ket,
            "Datei"     => $now
                    );
            
        $this->M_toko->inputdata($data);
        echo json_encode(array("status" => TRUE));
        }
    }
    
       public function ajax_edit($id)
    {
        $data = $this->M_toko->edit($id);
        echo json_encode($data);
    }

    function ajax_update(){

        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');

        $this->form_validation->set_rules('kode','kode','trim|required');
        $this->form_validation->set_rules('nama','nama','trim|required');
        $this->form_validation->set_rules('lokasi','lokasi','trim|required');
        $this->form_validation->set_rules('pemilik','pemilik','trim|required');
        $this->form_validation->set_rules('status','status','trim|required|in_list[T,F]');

        if($this->form_validation->run() == false)
        {
            
        }
        else
        {
        
        $id = $this->security->sanitize_filename($this->input->post('id'));
        $kode = $this->security->sanitize_filename($this->input->post('kode'));
        $lokasi = $this->security->sanitize_filename($this->input->post('lokasi'));
        $nama = $this->security->sanitize_filename($this->input->post('nama'));
        $pemilik = $this->security->sanitize_filename($this->input->post('pemilik'));
        $telp = $this->security->sanitize_filename($this->input->post('telp'));
        $jambuka = $this->security->sanitize_filename($this->input->post('jambuka'));
        $jamtutup = $this->security->sanitize_filename($this->input->post('jamtutup'));
        $status = $this->security->sanitize_filename($this->input->post('status'));
        $ket = $this->security->sanitize_filename($this->input->post('ket'));

    $data = array(  
        "Kode"      => $kode,
        "Nama"      => $nama,
        "Pemilik"   => $pemilik,
        "Ket"       => $ket,
        "Lokasi"    => $lokasi,
        "Telp"      => $telp,
        "Jambuka"   => $jambuka,
        "Jamtutup"  => $jamtutup,
        "Status"    => $status,
        "Ket"       => $ket,
        "Dateu"     => $now
            );

        $where = array(
        'ID' => $id
    );
 
        $this->M_toko->update($where,$data);
        echo json_encode(array("status" => TRUE));
    }

} 
	
}
