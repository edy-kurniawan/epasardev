<?php

class M_login extends CI_Model{

  function cek_login($login,$where){

    return $this->db->get_where($login,$where);

  }

  function getSemua(){
    $sql    =   "SELECT
                  login.ID,
                  login.Username,
                  login.Pas,
                  login.Refuser,
                  login.Refcart,
                  login.Status,
                  user.Nama,
                  cart.Kode Keranjang
                FROM
                login
                  LEFT OUTER JOIN login ON login.Refuser = user.Kode 
                  LEFT OUTER JOIN login ON login.Refcart = cart.Kode 
        ";
    return $this-> DbHelper->execQuery($sql);

  }

    function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    function inputdata($data2,$table){
        $this->db->insert($table,$data2);
    }

    public function edit($id)
    {
    $query = $this->db->query("SELECT
                        *
                          FROM login
                        where login.ID='$id'");
      return $query->row(); 
    }

    public function delete_by_kode($id)
    {
        $this->db->where('ID', $id);
        $this->db->delete('toko');
    }  

    public function update($where, $data)
    {
        $this->db->update('login', $data, $where);
    }

}