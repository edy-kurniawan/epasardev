<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_xpenjualand extends CI_Model{

    function __construct() {
        parent::__construct();
        
    }

    function inputdata($data,$table){
        $this->db->insert($table,$data);
    }

    function get_no_penjualan(){
        $q = $this->db->query("SELECT MAX(RIGHT(Kode,4)) AS kd_max FROM xpenjualan WHERE DATE(Datei)=CURDATE()");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return date('Y-m-d').$kd;
    }

    function get_by_kode($kode){
        $this->db->select('xpenjualand.Harga, xpenjualand.Jumlah, xpenjualand.Subtotal, barang.Nama');
        $this->db->from('xpenjualand');
        $this->db->join('barang', 'barang.Kode=xpenjualand.Refbarang','left');
        $this->db->where('xpenjualand.Kode', $kode);
        $query = $this->db->get();
        return $query; 
    }

}