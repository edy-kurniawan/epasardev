<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang extends CI_Model{

    function __construct() {
        parent::__construct();
        
        $this->load->model('DbHelper');
    }

    /* Model for admin */

    function getSemua(){

        $this->db->select('barang.ID, barang.Kode, barang.Nama, barang.Harga, barang.Status, barang.Satuan, barang.Img, barang.Ket, kategori.Nama kat');
        $this->db->from('barang');
        $this->db->join('kategori', 'kategori.Kode=barang.Refkategori','left');
        $this->db->order_by('barang.Datei', 'DESC');
        $query = $this->db->get();
        return $query;

    }


    function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    function inputdata($data,$table){
        $this->db->insert($table,$data);
    }

    public function edit($id)
    {
        $this->db->select('barang.ID, barang.Kode, barang.Nama, barang.Harga, barang.Refkategori, barang.Status, barang.Satuan, barang.Img, barang.Ket, kategori.Nama Kat ');
        $this->db->from('barang');
        $this->db->join('kategori', 'kategori.Kode=barang.Refkategori','left');
        $this->db->where('barang.ID', $id);
        $query = $this->db->get();
        return $query->row();
    }

     public function delete_by_kode($id)
    {
        $this->db->where('ID', $id);
        $this->db->delete('barang');
    }  
     public function update($where, $data)
    {
        $this->db->update('barang', $data, $where);
    }

    function countbarang(){

        $query = $this->db->query("SELECT count(Kode) jml from barang ");
        return $query->row();
    }

    function countnon(){

        $query = $this->db->query("SELECT count(Kode) jml from barang where Status ='F' ");
        return $query->row();
    }

    function countaktif(){

        $query = $this->db->query("SELECT count(Kode) jml from barang where Status ='T' ");
        return $query->row();
    }

    function countkat(){

        $query = $this->db->query("SELECT count(Kode) jml from kategori");
        return $query->row();
    }

    /* Model for client */

    function showbarang(){
        $this->db->select('barang.ID, barang.Kode, barang.Nama, barang.Harga, barang.Status, barang.Satuan, barang.Img, barang.Ket, kategori.Nama kat');
        $this->db->from('barang');
        $this->db->join('kategori', 'kategori.Kode=barang.Refkategori','left');
        $this->db->where('barang.Status','T');
        $this->db->order_by('barang.Datei', 'DESC');
        $this->db->limit(7);
        $query = $this->db->get();
        return $query;
    }

    function add_cart($id){
        $this->db->select('barang.ID, barang.Kode, barang.Nama, barang.Harga');
        $this->db->from('barang');
        $this->db->where('barang.ID', $id);
        $query = $this->db->get();
        return $query->row(); 
    }
    

    function search($keyword=null){
        $this->db->select('barang.ID, barang.Kode, barang.Nama, barang.Harga, barang.Img, barang.Satuan,');
        $this->db->from('barang');
        $this->db->like('barang.Nama', $keyword);
        $this->db->where('barang.Status','T');
        $query = $this->db->get(); 
        return $query;
    }

    function get_harga($kode){
        $this->db->select('barang.Harga');
        $this->db->from('barang');
        $this->db->where('barang.Kode', $kode);
        $query = $this->db->get();
        return $query;
    }

    function get_sembako(){
        $query = $this->db->get_where('barang', array('Refkategori' => "KAT1"));
        return $query;
    }

    function get_daging(){
        $query = $this->db->get_where('barang', array('Refkategori' => "KAT2"));
        return $query;
    }

    function get_sayur(){
        $query = $this->db->get_where('barang', array('Refkategori' => "KAT3"));
        return $query;
    }


}
