<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model{

    function __construct() {
        parent::__construct();
        
        $this->load->model('DbHelper');
    }
    function getSemua(){
        $sql    =   "SELECT
                        kategori.ID,
                        kategori.Kode,
                        kategori.Nama,
                        kategori.Ket
                    FROM
                        kategori";
        return $this-> DbHelper->execQuery($sql);

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
     $query = $this->db->query("SELECT
                        kategori.ID,
                        kategori.Kode,
                        kategori.Nama,
                        kategori.Ket
                        FROM kategori
                                where kategori.ID='$id'");
       return $query->row(); 
    }

     public function delete_by_kode($id)
    {
        $this->db->where('ID', $id);
        $this->db->delete('kategori');
    }  
     public function update($where, $data)
    {
        $this->db->update('kategori', $data, $where);
    }
 

}
