<?php

// extends class Model
class kategoriM extends CI_Model{

  // response jika field ada yang kosong
  public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';
    return $response;
  }

  // function untuk insert data ke tabel 
  public function add($nama,$kode,$ket){

    if(empty($nama) || empty($kode)){
      return $this->empty_response();
    }else{
      $data = array(
        "Kode"=>$kode,
        "Nama"=>$nama,
        "Ket"=>$ket
      );

      $insert = $this->db->insert("kategori", $data);

      if($insert){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data  ditambahkan.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data  gagal ditambahkan.';
        return $response;
      }
    }

  }

  // mengambil semua data 
  public function all(){

    $all = $this->db->get("kategori")->result();
    $response['status']=200;
    $response['error']=false;
    $response['']=$all;
    return $response;

  }

  // hapus data 
  public function delete($id){

    if($id == ''){
      return $this->empty_response();
    }else{
      $where = array(
        "ID"=>$id
      );

      $this->db->where($where);
      $delete = $this->db->delete("kategori");
      if($delete){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data  dihapus.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data  gagal dihapus.';
        return $response;
      }
    }

  }

  // update 
  public function update($id,$nama,$kode,$ket){

    if($id == '' || empty($nama) || empty($kode)){
      return $this->empty_response();
    }else{
      $where = array(
        "ID"=>$id
      );

      $set = array(
        "Nama"=>$nama,
        "Kode"=>$kode,
        "Ket"=>$ket
      );

      $this->db->where($where);
      $update = $this->db->update("kategori",$set);
      if($update){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data  diubah.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data  gagal diubah.';
        return $response;
      }
    }

  }

}

?>
