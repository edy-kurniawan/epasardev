<?php
class Order extends CI_Controller{

    function __construct(){
        parent::__construct();
        if ($this->session->userdata['logged_user'] == TRUE) {
        } else {
            $this->session->set_flashdata('error', '</br><div style="color : red;">Login Terlebih Dahulu</div>');
            redirect(base_url('signin'));
        }
        $this->load->helper(array('form', 'url','security')); 
        $this->load->library(array('form_validation','session'));
        $this->load->model(array('DbHelper', 'M_profile','M_order','M_xpenjualand','M_cart','M_xpenjualan'));
    }

    function index(){
        $refuser        = $this->session->userdata("username");
        $cek_cart       = $this->M_cart->get_all($refuser);
        if($cek_cart->num_rows()>0){
            $data['user']   = $this->M_profile->get_from_order($refuser)->result();
            $data['prov']   = $this->M_order->get_prov()->result();
            $data['kab']    = $this->M_order->get_kab()->result();
            $data['kec']    = $this->M_order->get_kec()->result();
            $data['kode']   = $this->M_xpenjualand->get_no_penjualan();
            $data['total']  = $this->M_cart->sum($refuser)->result();
            $this->load->view('Client/v_order',$data);
        }else{
            $this->session->set_flashdata('message', '<div style="color : red;"><strong><i class="icon fa fa-times-circle"></i> Keranjang Belanja Kosong</strong></div>');
            redirect('cart');
        }
    }

    function bayar(){
        $refuser        = $this->session->userdata("username");
        $data['detail'] = $this->M_xpenjualan->get_last_order($refuser)->result();
        $this->load->view('Client/v_pembayaran',$data);
    }

    function ambil_order(){

        $this->form_validation->set_rules('an', 'an', 'required|min_length[3]');
        $this->form_validation->set_rules('telp', 'telp', 'required|min_length[7]');

        if($this->form_validation->run() === FALSE){ 
            
            $this->session->set_flashdata('message', '<font color="red">
                <strong>Masukan Data Dengan Benar !</strong></font>
            ');
            redirect('order');

        }else{

        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now        = date('Y-m-d H:i:s');
        $refuser    = $this->session->userdata("username");
        $result     = $this->M_cart->get_all($refuser)->result(); //get all user cart
        $get_total  = $this->M_cart->sum_subtotal($refuser)->result(); //get total
                foreach ($get_total as $r) {
                    $total = $r->Subtotal;
                }
        $ket        = $this->input->post('ket',TRUE);
        $an         = $this->input->post('an',TRUE);
        $telp       = $this->input->post('telp',TRUE);
        $kode       = $this->M_xpenjualand->get_no_penjualan(); //get autokode transaksi
        
        //insert xpenjualan
        $order    = array(
            "Kode"      => $kode,
            "Total"     => $total,
            "Subtotal"  => $total,
            "Status"    => "0",
            "Ket"       => $ket,
            "Refuser"   => $refuser,
            "An"        => $an,
            "Telp"      => $telp,
            "Datei"     => $now,
            "Metode"    => "Ambil"
                );
        $this->M_xpenjualan->inputdata($order,'xpenjualan');
        
        //insert xpenjualand
        foreach ($result as $r) {
            $data    = array(
                        "Kode"      => $kode,
                        "Refbarang" => $r->Kode,
                        "Harga"     => $r->Harga,
                        "Jumlah"    => $r->Jumlah,
                        "Subtotal"  => $r->Subtotal
                 );
            
            $this->M_xpenjualand->inputdata($data,'xpenjualand');
            }   
            
        redirect('bayar');
        }
        
    }

    function deliv1_order(){
        $this->form_validation->set_rules('nama', 'nama', 'required|min_length[3]');
        $this->form_validation->set_rules('notelp', 'notelp', 'required|min_length[7]');

        if($this->form_validation->run() === FALSE){ 
            
            $this->session->set_flashdata('message', '<font color="red">
                <strong>Masukan Data Dengan Benar !</strong></font>
            ');
            redirect('order');

        }else{
        
        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now        = date('Y-m-d H:i:s');
        $refuser    = $this->session->userdata("username");
        $result     = $this->M_cart->get_all($refuser)->result(); //get all user cart
        $get_total  = $this->M_cart->sum_subtotal($refuser)->result(); //get total
                foreach ($get_total as $r) {
                    $subtotal = $r->Subtotal;
                }
        $get_profile  = $this->M_profile->get_from_order($refuser)->result(); //get user alamat
                foreach ($get_profile as $r) {
                    $alamat = $r->Alamat;
                    $kel    = $r->Kel;
                    $kec    = $r->Kec;
                    $kab    = $r->Kab;
                    $prov   = $r->Prov;
                }
        $get_ongkir  = $this->M_order->get_ongkir($kel)->result(); //get ongkir
                foreach ($get_ongkir as $r) {
                    $ongkir = $r->ongkir;
                }
        $total      = $subtotal + $ongkir;
        $ket        = $this->input->post('catatan',TRUE);
        $an         = $this->input->post('nama',TRUE);
        $telp       = $this->input->post('notelp',TRUE);
        $kode       = $this->M_xpenjualand->get_no_penjualan(); //get autokode transaksi
        
        //insert xpenjualan
        $order    = array(
            "Kode"      => $kode,
            "Total"     => $total,
            "Ket"       => $ket,
            "Subtotal"  => $subtotal,
            "Ongkir"    => $ongkir,
            "Refuser"   => $refuser,
            "Status"    => "0",
            "An"        => $an,
            "Telp"      => $telp,
            "Metode"    => "Kirim",
            "Datei"     => $now,
            "Prov"      => $prov,
            "Kab"       => $kab,
            "Kec"       => $kec,
            "Kel"       => $kel,
            "Alamat"    => $alamat
            );
        $this->M_xpenjualan->inputdata($order,'xpenjualan');
        
        //insert xpenjualand
        foreach ($result as $r) {
            $data    = array(
                        "Kode"      => $kode,
                        "Refbarang" => $r->Kode,
                        "Harga"     => $r->Harga,
                        "Jumlah"    => $r->Jumlah,
                        "Subtotal"  => $r->Subtotal
            );
            
            $this->M_xpenjualand->inputdata($data,'xpenjualand');
            } 
        redirect('bayar'); 
        } 
        
    }

    function deliv2_order(){
        $this->form_validation->set_rules('atasnama', 'atasnama', 'required|min_length[3]');
        $this->form_validation->set_rules('nohp', 'nohp', 'required');
        $this->form_validation->set_rules('prov', 'prov', 'required');
        $this->form_validation->set_rules('kab', 'kab', 'required');
        $this->form_validation->set_rules('kec', 'kec', 'required');
        $this->form_validation->set_rules('kel', 'kel', 'required');
        $this->form_validation->set_rules('alamat2', 'alamat2', 'required');

        if($this->form_validation->run() === FALSE){ 
            
            $this->session->set_flashdata('message', '<font color="red">
                <strong>Masukan Data Dengan Benar !</strong></font>
            ');
            redirect('order');

        }else{
        
        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now        = date('Y-m-d H:i:s');
        $refuser    = $this->session->userdata("username");
        $result     = $this->M_cart->get_all($refuser)->result(); //get all user cart
        $get_total  = $this->M_cart->sum_subtotal($refuser)->result(); //get total
                foreach ($get_total as $r) {
                    $subtotal = $r->Subtotal;
                }
        $kel        = $this->input->post('kel',TRUE);
        $get_ongkir  = $this->M_order->get_ongkir($kel)->result(); //get ongkir
                foreach ($get_ongkir as $r) {
                    $ongkir = $r->ongkir;
                }
        $total      = $subtotal + $ongkir;
        $ket        = $this->input->post('ket',TRUE);
        $an         = $this->input->post('atasnama',TRUE);
        $telp       = $this->input->post('nohp',TRUE);
        $prov       = $this->input->post('prov',TRUE);
        $kab        = $this->input->post('kab',TRUE);
        $kec        = $this->input->post('kec',TRUE);
        $alamat     = $this->input->post('alamat2',TRUE);
        $kode       = $this->M_xpenjualand->get_no_penjualan(); //get autokode transaksi
        
        //insert xpenjualan
        $order    = array(
            "Kode"      => $kode,
            "Total"     => $total,
            "Ket"       => $ket,
            "Subtotal"  => $subtotal,
            "Ongkir"    => $ongkir,
            "Refuser"   => $refuser,
            "An"        => $an,
            "Telp"      => $telp,
            "Status"    => "0",
            "Metode"    => "Kirim",
            "Datei"     => $now,
            "Prov"      => $prov,
            "Kab"       => $kab,
            "Kec"       => $kec,
            "Kel"       => $kel,
            "Alamat"    => $alamat
            );
        $this->M_xpenjualan->inputdata($order,'xpenjualan');
        
        //insert xpenjualand
        foreach ($result as $r) {
            $data    = array(
                        "Kode"      => $kode,
                        "Refbarang" => $r->Kode,
                        "Harga"     => $r->Harga,
                        "Jumlah"    => $r->Jumlah,
                        "Subtotal"  => $r->Subtotal
            );
            
            $this->M_xpenjualand->inputdata($data,'xpenjualand');
            }  
        
        redirect('bayar');
        } 
        
    }

    function verivy_kel(){
        $refuser    = $this->session->userdata("username");
        $data       = $this->M_profile->verivy_kel($refuser);
        echo json_encode($data);
    }

    function get_kel(){
        $id   = $this->input->post('id',TRUE);
        $data = $this->M_order->get_kel($id)->result();
        echo json_encode($data);
    }

}