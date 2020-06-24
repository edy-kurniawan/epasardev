<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pembayaran extends CI_Model{

    function __construct() {
        parent::__construct();
        $this->load->model('DbHelper');
    }

    function inputdata($data,$table){
        $this->db->insert($table,$data);
    }

}