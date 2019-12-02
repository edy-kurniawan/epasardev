<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model{

    function __construct() {
        parent::__construct();
        
    }
   function counttoko(){

        $query = $this->db->query("SELECT count(Kode) jml from toko ");
        return $query->row();
    }
    function tokoaktif(){

        $query = $this->db->query("SELECT count(Kode) jml from toko where status = 'T' ");
        return $query->row();
    }
    function tokononaktif(){

        $query = $this->db->query("SELECT count(Kode) jml from toko where status = 'F' ");
        return $query->row();
    }
    function countsupplier(){

        $query = $this->db->query("SELECT count(kode) jml from msupplier");
        return $query->row();
    }
    function counttotal(){

        $query = $this->db->query("SELECT sum(total) jml from mbarang where aktif = 't' ");
        return $query->row();
    }
    function countkategori(){

        $query = $this->db->query("SELECT count(kode) jml from mkategori");
        return $query->row();
    }
    function countbarangmasuk(){
        $query  = $this->db->query("select mbarang.tgl, sum(mbarang.total) jumlah from mbarang  GROUP BY mbarang.tgl");
        return $query->result();
    }
}