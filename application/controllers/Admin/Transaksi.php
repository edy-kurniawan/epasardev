<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

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
         $this->load->helper(array('form', 'url','detail','pesanan')); 
         $this->load->model(array('DbHelper', 'M_user','M_xpenjualan','M_xpenjualand','M_cart')); 

        // $this->load->model('M_login');
    }

    public function index(){
        $data['trx']   = $this->M_xpenjualan->getSemua()->result();
        $this->load->view('Admin/v_transaksi',$data);
    }

    public function setView(){
        $result = $this->M_xpenjualan->getSemua()->result();
        $list   = array();
        $No     = 1;
        foreach ($result as $r) {
            if ($r->Status == "0") {
                $stts = "<span class='badge badge-success'>Menunggu Konfirmasi Ketersediaan</span>";
              } elseif ($r->Status == "1") {
                $stts = "<span class='badge badge-info'>Menunggu Pembayaran</span>";
              } elseif ($r->Status == "2") {
                $stts = "<span class='badge badge-warning'>Dibayar</span>";
              } elseif ($r->Status == "3") {
                $stts = "<span class='badge badge-dark'>Pesanan Disiapkan</span>";
              } elseif ($r->Status == "4") {
                $stts = "<span class='badge badge-primary'>Pesanan Siap Diambil / Dikirim</span>";
              } elseif ($r->Status == "5") {
                $stts = "<span class='badge badge-danger'>Selesai</span>";
              }elseif ($r->Status == "6") {
                $stts = "<span class='badge badge-danger'>Tidak Tersedia / Dibatalkan</span>";
              } else {
                $stts = "";
              }
            if ($r->Metode == "Kirim") {
                $metode = "<span class='badge badge-pill badge-warning'>Kirim <i class='fas fa-truck'></span>";
              } elseif ($r->Metode == "Ambil") {
                $metode = "<span class='badge badge-pill badge-secondary'>Ambil <i class='fas fa-walking'></span>";
              } else {
                $metode = "";
              }
              
            $row    = array(
                        "no"        => $No,
                        "kode"      => html_escape($r->Kode),
                        "nama"      => html_escape($r->Refuser),
                        "metode"    => $metode,
                        "status"    => $stts,
                        "total"     => html_escape(number_format($r->Total)),
                        "action"    => pesanan($r->ID)
            );

            $list[] = $row;
            $No++;
        }   

        echo json_encode(array('data' => $list));
    }

    function print(){
      $id    = "25";
      $cek   = $this->M_xpenjualan->get($id);
      if($cek->num_rows()>0){ 
        $data['trx']   = $this->M_xpenjualan->get($id)->result();
        foreach ($data['trx'] as $r) {
          $kode = $r->Kode;
        }
        $data['detail']   = $this->M_xpenjualand->get_by_kode($kode)->result();
      }else {
        redirect(base_url('administrator/transaksi'));
      }
      
      $this->load->view('Admin/v_print',$data);
    }

    function get_detail(){
      $id    = $this->uri->segment(3);
      $cek   = $this->M_xpenjualan->get($id);
      if($cek->num_rows()>0){ 
        $data['trx']   = $this->M_xpenjualan->get($id)->result();
        foreach ($data['trx'] as $r) {
          $kode = $r->Kode;
        }
        $data['detail']   = $this->M_xpenjualand->get_by_kode($kode)->result();
      }else {
        redirect(base_url('administrator/transaksi'));
      }
      
      $this->load->view('Admin/v_transaksi_detail',$data);
    }

    public function ajax_edit($id)
    {
        $data = $this->M_xpenjualan->edit_status($id);
        echo json_encode($data);
    }

    public function get_img($id)
    {
        $data = $this->M_xpenjualan->get_img($id);
        echo json_encode($data);
    }

    function ajax_update(){
        
      $this->form_validation->set_rules('id','id','trim|required');
      $this->form_validation->set_rules('status','status','trim');

      if($this->form_validation->run() == false)
      {
          
      }
      else
      {

      $id     = $this->security->sanitize_filename($this->input->post('id'));
      $status = $this->security->sanitize_filename($this->input->post('status'));

        $data = array(  
          "Status"       => $status
            );

        $where = array(
          'ID' => $id
          );

      $this->M_xpenjualan->update($where,$data);
      echo json_encode(array("status" => TRUE));
      }
    }

    public function getcount(){
      $user   = $this->M_xpenjualan->count_all();
      $aktif  = $this->M_xpenjualan->count_terkonfirmasi();
      $non    = $this->M_xpenjualan->count_selesai();
      $pasif  = $this->M_xpenjualan->count_dibayar();
      echo json_encode(array(
          'all'     => $user->jml,
          'konfir'  => $aktif->jml,
          'done'    => $non->jml,
          'pay'     => $pasif->jml,
          )
      );
  }
}