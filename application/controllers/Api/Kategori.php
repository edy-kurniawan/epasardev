<?php

require APPPATH . 'libraries/REST_Controller.php';

class Kategori extends REST_Controller{

  // construct
  public function __construct(){
    parent::__construct();
    $this->load->model('KategoriM');
  }

  // method index untuk menampilkan semua data person menggunakan method get
  public function index_get(){
    $response = $this->KategoriM->all();
    $this->response($response);
  }

  // untuk menambah person menaggunakan method post
  public function add_post(){
    $response = $this->KategoriM->add(
        $this->post('nama'),
        $this->post('kode'),
        $this->post('ket')
      );
    $this->response($response);
  }

  // update data person menggunakan method put
  public function update_put(){
    $response = $this->KategoriM->update(
        $this->put('id'),
        $this->put('nama'),
        $this->put('kode'),
        $this->put('ket')
      );
    $this->response($response);
  }

  // hapus data person menggunakan method delete
  public function delete_delete(){
    $response = $this->KategoriM->delete(
        $this->delete('id')
      );
    $this->response($response);
  }

}

?>
