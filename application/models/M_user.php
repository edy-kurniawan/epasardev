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
                    user.Refuser,
                    user.Nama,
                    user.Alamat,
                    user.Tgllahir,
                    user.Jenis,
                    user.Telp,
                    user.Email,
                    login.Username
                FROM
                    user
                    LEFT OUTER JOIN login ON user.Refuser = login.Username
                        ";
        return $this-> DbHelper->execQuery($sql);

    }

    function get_user_list($limit, $start){
        $this->db->order_by('Refuser', 'ASC');
        $query = $this->db->get('user', $limit, $start);
        return $query;
    }

    function get_user_by_id($id){
        $this->db->select('user.ID, login.Onlast, user.Refuser, user.Datei, user.Nama, user.Jenis, user.Tgllahir, user.Telp, user.Img, user.Alamat, provinsi.nama prov, kabupaten.nama kab, kecamatan.nama kec, kelurahan.nama kel, user.Email');
        $this->db->from('user');
        $this->db->join('login', 'login.Username=user.Refuser','left');
        $this->db->join('provinsi', 'provinsi.id_prov=user.Prov','left');
        $this->db->join('kabupaten', 'kabupaten.id_kab=user.Kab','left');
        $this->db->join('kecamatan', 'kecamatan.id_kec=user.Kec','left');
        $this->db->join('kelurahan', 'kelurahan.id_kel=user.Kel','left');
        $this->db->where('user.ID', $id);
        $query = $this->db->get();
        return $query; 
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

    function usermax(){

        $this->db->select_max('Refuser');
        $query = $this->db->get('xpenjualan');
        return $query->row();
    }

    // Check username exists
  public function check_username_exists($username){
    $query = $this->db->get_where('login', array('Username' => $username));
    if(empty($query->row_array())){
     return true;
    } else {
     return false;
    }
   }
 
   // Check email exists
   public function check_email_exists($email){
    $query = $this->db->get_where('user', array('Email' => $email));
    if(empty($query->row_array())){
     return true;
    } else {
     return false;
    }
   }
 

}
