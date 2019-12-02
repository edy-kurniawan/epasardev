<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model{

    function __construct() {
        parent::__construct();
        
        $this->load->model('DbHelper');
    }
    
    function getSemua(){
                        $sql    =   "SELECT
                    user.ID,
                    user.Kode,
                    user.Nama,
                    user.Alamat,
                    user.Tgllahir,
                    user.Jenis,
                    user.Telp,
                    user.Email,
                    login.Username
                FROM
                    user
                    LEFT OUTER JOIN login ON user.Kode = login.Refuser
                        ";
        return $this-> DbHelper->execQuery($sql);

    }

    function getcart($id){
        $sql    =   "SELECT
                        user.ID,
                        cart.Refbarang,
                        cart.Jumlah,
                        cart.Subtotal,
                        barang.Nama
                    FROM
                        user 
                    LEFT OUTER JOIN login ON user.Kode = login.Refuser
                    LEFT OUTER JOIN cart ON login.Refcart = cart.Kode
                    LEFT OUTER JOIN barang ON cart.Refbarang = barang.Kode
                    WHERE user.ID='$id'";
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
                    user.Datei,
                    user.Dateu
                FROM
                    user
                    where user.ID='$id'");
       return $query->row(); 
    }

     public function delete_by_kode($id)
    {
        $this->db->where('ID', $id);
        $this->db->delete('user');
    }  
     public function update($where, $data)
    {
        $this->db->update('user', $data, $where);
    }

    function useraktif(){

        $query = $this->db->query("SELECT count(Username) jml from login where status = 'T' ");
        return $query->row();
    }

    function usernonaktif(){

        $query = $this->db->query("SELECT count(Username) jml from login where status = 'F' ");
        return $query->row();
    }

    function totaluser(){

        $query = $this->db->query("SELECT count(Username) jml from login");
        return $query->row();
    }

    function userpasif(){

        $query = $this->db->query("SELECT count(Username) jml from login");
        return $query->row();
    }
 

}
