<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_toko extends CI_Model{

    function __construct() {
        parent::__construct();
        
        $this->load->model('DbHelper');
    }

    function getSemua(){
        $query = $this->db->get('toko');
        return $query;
    }


    function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    function inputdata($data){
        $this->db->set($data);
        $this->db->insert($this->db->dbprefix . 'toko');
    }

    public function edit($id)
    {
     $query = $this->db->query("SELECT
                        *
                        FROM toko
                                where toko.ID='$id'");
       return $query->row(); 
    }

     public function delete_by_kode($id)
    {
        $this->db->where('ID', $id);
        $this->db->delete('toko');
    }  
     public function update($where, $data)
    {
        $this->db->update('toko', $data, $where);
    }
 
    function counttoko(){

        $query = $this->db->query("SELECT count(Kode) jml from toko");
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

}
