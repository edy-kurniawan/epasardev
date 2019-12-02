<?php

require APPPATH . 'libraries/REST_Controller.php';

class Barang extends REST_Controller{

  // construct
  public function __construct(){
    parent::__construct();
    $this->load->model('BarangM');
  }

  // method index untuk menampilkan semua data person menggunakan method get
  public function index_get(){
    $response = $this->BarangM->all();
    $this->response($response);
  }

}

?>
