<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_cart extends CI_Model{

    function __construct() {
        parent::__construct();
        
    }

    function get_cart($refuser){
        $this->db->select('cart.ID, cart.Jumlah, cart.Subtotal, barang.Nama, barang.Img, barang.Harga, barang.Satuan');
        $this->db->from('cart');
        $this->db->join('barang', 'cart.Refbarang=barang.Kode','left');
        $this->db->where('cart.Refuser', $refuser);
        $this->db->order_by('cart.Datei', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query;
    }

    function cek_cart($refuser,$refbarang){

        $this->db->select('*');
        $this->db->from('cart');
        $this->db->where('cart.Refuser', $refuser);
        $this->db->where('cart.Refbarang', $refbarang);
        $query = $this->db->get();
        return $query;

      }

    function verify_cart($refuser,$refbarang){
        $this->db->select('cart.Jumlah');
        $this->db->from('cart');
        $this->db->where('cart.Refuser', $refuser);
        $this->db->where('cart.Refbarang', $refbarang);
        $query = $this->db->get();
        return $query;
    }

    function count_cart($refuser){
        $query = $this->db->query("SELECT count(Refbarang) jml from cart where Refuser ='$refuser'");
        return $query->row();
    }

    function inputdata($data,$table){
        $this->db->insert($table,$data);
    }

    function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function edit($id)
    {
     $query = $this->db->query("SELECT
                        *
                        FROM toko
                                where toko.ID='$id'");
       return $query->row(); 
    }

     public function delete_by_kode($id,$refuser)
    {
        $this->db->where('ID', $id);
        $this->db->where('Refuser', $refuser);
        $this->db->delete('cart');
    }  

     public function update($where, $data)
    {
        $this->db->update('cart', $data, $where);
    }
 

}
