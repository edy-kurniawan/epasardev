<?php
class Home extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->helper('security');
        $this->load->helper(array('form', 'url')); 
        $this->load->model(array('DbHelper', 'M_barang','M_cart','M_kategori'));
    }

    function index(){
        $refuser        = $this->session->userdata("username");
        $cart['kat']    = $this->M_kategori->getSemua()->result();
        $cart['cart']   = $this->M_cart->get_cart($refuser)->result();
        $data['barang'] = $this->M_barang->showbarang()->result();
        $data['sembako']= $this->M_barang->get_sembako()->result();
        $data['daging'] = $this->M_barang->get_daging()->result();
        $data['sayur']  = $this->M_barang->get_sayur()->result();
        $this->load->view('template/client/head',$cart);
        $this->load->view('Client/v_home',$data);
    }

    function add_cart($id=null){
        $this->cek_login();
        $data = $this->M_barang->add_cart($id);
        echo json_encode($data);
    }

    function save_cart(){
        $this->cek_login();
        $this->form_validation->set_rules('kode','kode','trim|required');
        $this->form_validation->set_rules('qty','qty','trim|required');
        $this->form_validation->set_rules('harga','harga','trim|required');
        if($this->form_validation->run() == false) 
        {
            
        }
        else
        {
            date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
            $now         = date('Y-m-d H:i:s');
            $refuser     = $this->session->userdata("username");
            $refbarang   = $this->input->post('kode',TRUE);
            $input_qty   = $this->input->post('qty',TRUE);
            
            $get_harga   = $this->M_barang->get_harga($refbarang)->result();
                foreach ($get_harga as $r) {
                    $harga = intval($r->Harga);
                }
            
            $verify_cart = $this->M_cart->cek_cart($refuser,$refbarang)->num_rows();
                if($verify_cart > 0){
                    $cart_qty   = $this->M_cart->verify_cart($refuser,$refbarang)->result();
                    foreach ($cart_qty as $r) {
                        $cart_jumlah = intval($r->Jumlah);
                }

                $qty        = intval($input_qty) + $cart_jumlah;
                $subtotal   = $qty * $harga;

                $data = array(
                    "Jumlah"        => $qty,
                    "Subtotal"      => $subtotal,
                    "Datei"         => $now
                    );
            
                    $where = array(
                    "Refuser"       => $refuser,
                    "Refbarang"     => $refbarang
                    );
             
                $this->M_cart->update($where,$data);
                redirect(base_url());
            }else{
                $qty        = $this->input->post('qty',TRUE);
                $subtotal   = $qty * $harga;
        
                $data = array(
                    "Refuser"       => $refuser,
                    "Refbarang"     => $refbarang,
                    "Jumlah"        => $qty,
                    "Subtotal"      => $subtotal,
                    "Datei"         => $now
                    );

                $this->M_cart->inputdata($data,'cart'); 
                redirect(base_url());
            }
        }  
    }

    function count_cart(){
        $this->cek_login();
        $refuser    = $this->session->userdata("username");
        $data       = $this->M_cart->count_cart($refuser);
        echo json_encode($data);
    }

    function delete_cart(){
        $this->cek_login();
        $id        = $this->input->post('id',TRUE);
        $refuser   = $this->session->userdata("username");
        $this->M_cart->delete_by_kode($id,$refuser);
        redirect('cart');
    }

    function cek_login(){
        if ($this->session->userdata['logged_user'] == TRUE)
        {
            return true;
        }
        else
        {
            $this->session->set_flashdata('error', '</br><div style="color : red;">Login Terlebih Dahulu</div>');
            redirect(base_url('signin'));
        }
    }
}
