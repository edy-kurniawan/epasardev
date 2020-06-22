<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_xpenjualan extends CI_Model{

    function __construct() {
        parent::__construct();
        
    }

    function inputdata($data,$table){
        $this->db->insert($table,$data);
    }

}