<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_order extends CI_Model{

    function __construct() {
        parent::__construct();
        
        $this->load->model('DbHelper');
    }

    function get_prov(){
        $query = $this->db->get_where('provinsi', array('id_prov' => '33'));
        return $query;  
    }

    function get_kab(){
        $this->db->select('id_kab, nama');
        $this->db->from('kabupaten');
        $this->db->where('id_kab', '3311');
        $query = $this->db->get();
        return $query; 
    }

    function get_kec(){
        $this->db->select('id_kec, nama');
        $this->db->from('kecamatan');
        $this->db->where('status', 't');
        $this->db->where('id_kab', '3311');
        $query = $this->db->get();
        return $query; 
    }

    function get_kel($id){
        $this->db->select('id_kel, nama, ongkir');
        $this->db->from('kelurahan');
        $this->db->where('status', 't');
        $this->db->where('id_kec', $id);
        $query = $this->db->get();
        return $query; 
    }

    function get_ongkir($id){
        $this->db->select('ongkir');
        $this->db->from('kelurahan');
        $this->db->where('status', 't');
        $this->db->where('id_kel', $id);
        $query = $this->db->get();
        return $query; 
    }

}