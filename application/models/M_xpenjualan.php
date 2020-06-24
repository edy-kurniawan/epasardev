<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_xpenjualan extends CI_Model{

    function __construct() {
        parent::__construct();
        
    }

    function inputdata($data,$table){
        $this->db->insert($table,$data);
    }

    function get_all($refuser){
        $this->db->select('ID, Kode, Total, Metode, An, Alamat, Kel');
        $this->db->from('xpenjualan');
        $this->db->where('Refuser', $refuser);
        $this->db->order_by('Datei', 'DESC');
        $query = $this->db->get();
        return $query; 
    }

    function get_last_order($refuser){
        $this->db->select('Kode, Total');
        $this->db->from('xpenjualan');
        $this->db->where('Refuser', $refuser);
        $this->db->order_by('Datei', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query; 
    }

    function get_by_id($refuser,$id){
        $this->db->select('xpenjualan.Kode, xpenjualan.Ket, xpenjualan.Metode ,xpenjualan.Subtotal, xpenjualan.Ongkir, xpenjualan.Total, xpenjualan.An, xpenjualan.Telp, xpenjualan.Alamat, provinsi.nama prov, kabupaten.nama kab, kecamatan.nama kec, kelurahan.nama kel');
        $this->db->from('xpenjualan');
        $this->db->join('provinsi', 'provinsi.id_prov=xpenjualan.Prov','left');
        $this->db->join('kabupaten', 'kabupaten.id_kab=xpenjualan.Kab','left');
        $this->db->join('kecamatan', 'kecamatan.id_kec=xpenjualan.Kec','left');
        $this->db->join('kelurahan', 'kelurahan.id_kel=xpenjualan.Kel','left');
        $this->db->where('xpenjualan.Refuser', $refuser);
        $this->db->where('xpenjualan.ID', $id);
        $query = $this->db->get();
        return $query; 
    }

    function get_detail($refuser,$id){
        $this->db->select('xpenjualan.Total, xpenjualan.Subtotal, xpenjualan.Ongkir, xpenjualand.Jumlah, xpenjualand.Subtotal subtotal, barang.Nama');
        $this->db->from('xpenjualan');
        $this->db->join('xpenjualand', 'xpenjualan.Kode=xpenjualand.Kode','left');
        $this->db->join('barang', 'xpenjualand.Refbarang=barang.Kode','left');
        $this->db->where('xpenjualan.Refuser', $refuser);
        $this->db->where('xpenjualan.ID', $id);
        $query = $this->db->get();
        return $query; 
    }

    function get_total_by_id($refuser,$id){
        $this->db->select('xpenjualan.Total, xpenjualan.Subtotal, xpenjualan.Ongkir');
        $this->db->from('xpenjualan');
        $this->db->where('xpenjualan.Refuser', $refuser);
        $this->db->where('xpenjualan.ID', $id);
        $query = $this->db->get();
        return $query; 
    }

}