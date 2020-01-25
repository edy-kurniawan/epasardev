<?php

// extends class Model
class BarangM extends CI_Model{

  // response jika field ada yang kosong
  public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';
    return $response;
  }
  
  // mengambil semua data 
  public function all(){

    $all = $this->db->get("barang")->result();
    $response=$all;
    return $response;

  }
}

?>
