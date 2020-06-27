<?php

class M_login extends CI_Model{

  function cek_login($login,$where){

    return $this->db->get_where($login,$where);

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
      $this->db->where('login.ID', $id);
      $query = $this->db->get();
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