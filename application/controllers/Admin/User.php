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
         $this->load->library('pagination');
         $this->load->helper('security');
         $this->load->helper(array('form', 'url','detail')); 
         $this->load->model(array('DbHelper', 'M_user','M_xpenjualan','M_cart','M_xpenjualand')); 
    

        // $this->load->model('M_login');
    }

    public function index(){
        //konfigurasi pagination
        $config['base_url'] = site_url('Admin/User/index'); //site url
        $config['total_rows'] = $this->db->count_all('user'); //total row
        $config['per_page'] = 3;  //show record per halaman
        $config["uri_segment"] = 4;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
 
        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['data'] = $this->M_user->get_user_list($config["per_page"], $data['page']);           
 
        $data['pagination'] = $this->pagination->create_links();
 
        $this->load->view('Admin/v_user',$data);
    }

    public function detail(){
        $id             = $this->input->post('id',TRUE);
        $refuser        = $this->input->post('kode',TRUE);
        $data['user']   = $this->M_user->get_user_by_id($id)->result();
        $data['trx']    = $this->M_xpenjualan->get_all($refuser)->result();
        $data['cart']   = $this->M_cart->get_all($refuser)->result();
        
        $this->load->view('Admin/v_user_detail', $data);
    }

    public function setView(){
        $kode           = $this->input->post('kode',TRUE);
        $result = $this->M_xpenjualand->get_by_kode($kode)->result();
        $list   = array();
        foreach ($result as $r) {
            $row    = array(
                        "Nama"       => html_escape($r->Nama),
                        "Jumlah"     => html_escape($r->Jumlah),
                        "Harga"      => html_escape($r->Harga),
                        "Subtotal"   => html_escape($r->Subtotal)
            );
            $list[] = $row;
        }   

        echo json_encode(array('data' => $list));
    }

    public function getcount(){
        $user   = $this->M_user->totaluser();
        $aktif  = $this->M_user->useraktif();
        $non    = $this->M_user->usernonaktif();
        $pasif  = $this->M_user->usermax();
        echo json_encode(array(
            'jml'    => $user->jml,
            'aktif'  => $aktif->jml,
            'non'    => $non->jml,
            'pasif'  => $pasif->Refuser,
            )
        );
    }

     public function ajax_edit($id)
    {
        $data = $this->M_user->edit($id);
        echo json_encode($data);
    }

    function status_update(){

        $this->form_validation->set_rules('id','id','trim|required');

        if($this->form_validation->run() == false)
        {
            
        }
        else
        {
        
        $id   = $this->input->post('id',TRUE);
        $data = $this->M_login->edit($id);
        foreach ($data as $r) {
            if($r->Status=="T"){ $stts = "F"; $json = "echo json_encode(array('status' => TRUE))";}
            elseif($r->Status=="F"){ $stts = "T"; $json = "echo json_encode(array('status2' => TRUE))";}
            else { $stts = ""; }
        }
        
        $data = array(  
            "Status" => $stts,
                );
    
        $where = array(
            'ID' => $id
            );
     
        $this->M_login->update($where,$data);
        $json;
        
        }
    }
	
}
