<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ongkir extends CI_Model{

    function __construct() {
        parent::__construct();
        
        $this->load->model('DbHelper');
    }

    function get_all(){
        $this->db->select('kelurahan.id_kel, kelurahan.nama kel, kelurahan.status, kelurahan.ongkir, kecamatan.nama kec');
        $this->db->from('kecamatan');
        $this->db->join('kelurahan', 'kecamatan.id_kec=kelurahan.id_kec','left');
        $this->db->where('kelurahan.status !=', null);
        $this->db->where('kelurahan.status !=', '');
        $this->db->where('kelurahan.ongkir !=', null);
        $this->db->where('kecamatan.id_kab', '3311');
        $query = $this->db->get();
        return $query; 
    }

    function get_by_id($id){
        $this->db->select('kelurahan.id_kel, kelurahan.nama kel, kelurahan.status, kelurahan.ongkir, kecamatan.nama kec');
        $this->db->from('kecamatan');
        $this->db->join('kelurahan', 'kecamatan.id_kec=kelurahan.id_kec','left');
        $this->db->where('kelurahan.status !=', null);
        $this->db->where('kelurahan.status !=', '');
        $this->db->where('kecamatan.id_kab', '3311');
        $this->db->where('kelurahan.id_kel =', $id);
        $query = $this->db->get();
        return $query; 
    }

    function get_kel_by_id($id){
        $this->db->select('id_kel, ongkir, status');
        $this->db->from('kelurahan');
        $this->db->where('kelurahan.id_kel', $id);
        $query = $this->db->get();
        return $query->row(); 
    }

    function get_kec(){
        $query = $this->db->get_where('kecamatan', array('id_kab' => '3311'));
        return $query;  
    }

    function get_kel($id){
        $this->db->select('id_kel, nama');
        $this->db->from('kelurahan');
        $this->db->where('id_kec', $id);
        $this->db->where('status =', null);
        $query = $this->db->get();
        return $query; 
    }
     
    public function update($where, $data)
    {
        $this->db->update('kelurahan', $data, $where);
    }

}