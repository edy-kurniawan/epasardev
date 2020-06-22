<?php
class Cart extends CI_Controller
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
        $this->load->model(array('DbHelper', 'M_login', 'M_cart','M_barang','M_xpenjualand'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->helper('security');
    }

    function index()
    {
        $refuser        = $this->session->userdata("username");
        $data['cart']   = $this->M_cart->get_all($refuser)->result();
        $data['total']  = $this->M_cart->sum($refuser)->result();
        $cart['cart']   = $this->M_cart->get_cart($refuser)->result();
        $this->load->view('template/client/head2', $cart);
        $this->load->view('Client/v_cart', $data);
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
