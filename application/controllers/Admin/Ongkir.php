<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ongkir extends CI_Controller {

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
         $this->load->model(array('DbHelper', 'M_kategori','M_ongkir')); 
         $this->load->library('form_validation'); 
         $this->load->helper('security');

    }

    public function index(){
        $data['kec']   = $this->M_ongkir->get_kec()->result();
        $this->load->view('Admin/v_ongkir',$data);
    }

    public function setView(){
        $result = $this->M_ongkir->get_all()->result();
        $list   = array();
        $No     = 1;
        foreach ($result as $r) {
            if($this->session->userdata("user") == "admin") {
            $row    = array(
                        "no"       => $No,
                        "kec"      => html_escape($r->kec),
                        "kel"      => html_escape($r->kel),
                        "ongkir"   => html_escape($r->ongkir),
                        "status"   => html_escape($r->status),
                        "action"   => tombol(html_escape($r->id_kel))
            );
        } else {
            $row    = array(
                "no"       => $No,
                "kec"      => html_escape($r->kec),
                "kel"      => html_escape($r->kel),
                "ongkir"   => html_escape($r->ongkir),
                "status"   => html_escape($r->status),
                "action"   => tombol()
            );
        }

            $list[] = $row;
            $No++;
        }   

        echo json_encode(array('data' => $list));
    }

    public function ajax_delete($id)
    {
        
        $data = array(
            "status"       => null,
            "ongkir"       => null
            );

        $where = array(
            'id_kel' => $id
        );

            $this->M_ongkir->update($where,$data);
            echo json_encode(array("status" => TRUE));
        
    }

    function ajax_add(){

        $this->form_validation->set_rules('kec','kec','trim|required');
        $this->form_validation->set_rules('kel','kel','trim|required');
        $this->form_validation->set_rules('ongkir','ongkir','trim|required');
        $this->form_validation->set_rules('status','status','trim|required');

        if($this->form_validation->run() == false)
        {
            
        }
        else
        {
        
        $kel = $this->security->sanitize_filename($this->input->post('kel'));
        $status = $this->security->sanitize_filename($this->input->post('status'));
        $ongkir = $this->security->sanitize_filename($this->input->post('ongkir'));
 
        $data = array(
            "status"       => $status,
            "ongkir"       => $ongkir
            );

        $where = array(
            'id_kel' => $kel
        );

            $this->M_ongkir->update($where,$data);
            echo json_encode(array("status" => TRUE));
        }
    }

    function ajax_update(){

        
        $id_kel = $this->security->sanitize_filename($this->input->post('id2'));
        $status = $this->security->sanitize_filename($this->input->post('status2'));
        $ongkir = $this->security->sanitize_filename($this->input->post('ongkir2'));
 
        $data = array(
            "status"       => $status,
            "ongkir"       => $ongkir
            );

        $where = array(
            'id_kel' => $id_kel
        );

            $this->M_ongkir->update($where,$data);
            echo json_encode(array("status" => TRUE));
        
    }
    
       public function ajax_edit($id)
    {
        $data = $this->M_ongkir->get_kel_by_id($id);
        echo json_encode($data);
    }
    
    function get_kel(){
        $id   = $this->input->post('id',TRUE);
        $data = $this->M_ongkir->get_kel($id)->result();
        echo json_encode($data);
    }

    

}
