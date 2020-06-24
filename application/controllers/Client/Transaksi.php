<?php
class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata['logged_user'] == TRUE) {
        } else {
            $this->session->set_flashdata('error', '</br><div style="color : red;">Login Terlebih Dahulu</div>');
            redirect(base_url('signin'));
        }

        $this->load->helper(array('form', 'url'));
        $this->load->model(array('DbHelper','M_cart','M_xpenjualand','M_kategori','M_xpenjualan'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->helper('security');
    }

    function index()
    {
        $refuser        = $this->session->userdata("username");
        $cart['cart']   = $this->M_cart->get_cart($refuser)->result();
        $cart['kat']    = $this->M_kategori->getSemua()->result();
        $data['data']   = $this->M_xpenjualan->get_all($refuser)->result();
        $this->load->view('template/client/head2',$cart);
        $this->load->view('Client/v_transaksi',$data);
    }

    function detail() //detail transaksi
    {
        $this->form_validation->set_rules('id', 'id', 'required');

        if($this->form_validation->run() === FALSE){ 
            redirect('transaksi');
        }else{
            $id             = $this->input->post('id', TRUE);
            $refuser        = $this->session->userdata("username");
            $data['detail'] = $this->M_xpenjualan->get_by_id($refuser,$id)->result();
            $data['barang'] = $this->M_xpenjualan->get_detail($refuser,$id)->result();
            $data['total']  = $this->M_xpenjualan->get_total_by_id($refuser,$id)->result();
            $cart['cart']   = $this->M_cart->get_cart($refuser)->result();
            $cart['kat']    = $this->M_kategori->getSemua()->result();
            $this->load->view('template/client/head2',$cart);
            $this->load->view('Client/v_detail',$data);
        }
        
    }

    function get_cart($id)
    {
        $refuser    = $this->session->userdata("username");
        $data       = $this->M_cart->get_cart_by_id($refuser, $id);
        echo json_encode($data);
    }

    function delete_cart(){
        $id        = $this->input->post('id',TRUE);
        $refuser   = $this->session->userdata("username");
        $this->M_cart->delete_by_kode($id,$refuser);
        redirect('cart');
    }

    function update_cart()
    {
        $this->form_validation->set_rules('kode', 'kode', 'trim|required');
        $this->form_validation->set_rules('qty', 'qty', 'trim|required');
        $this->form_validation->set_rules('harga', 'harga', 'trim|required');
        if ($this->form_validation->run() == false) {
        } else {
            date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
            $now        = date('Y-m-d H:i:s');
            $refuser    = $this->session->userdata("username");
            $refbarang  = $this->input->post('kode', TRUE);
            $qty        = $this->input->post('qty', TRUE);
            $get_harga  = $this->M_barang->get_harga($refbarang)->result();
                foreach ($get_harga as $r) {
                    $harga = intval($r->Harga);
                }
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
            redirect('cart');
        }
    }

}
