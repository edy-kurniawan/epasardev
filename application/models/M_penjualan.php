<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penjualan extends CI_Model{

    function __construct() {
        parent::__construct();
        
        $this->load->model('DbHelper');
    }
    
    function getSemua(){

        $this->db->select('xpenjualan.ID, xpenjualan.Kode, xpenjualan.Refuser, xpenjualan.Metode, xpenjualan.Status, xpenjualan.Total, xpenjualan.Ket');
        $this->db->from('xpenjualan');
        $this->db->order_by('xpenjualan.Datei', 'DESC');
        $query = $this->db->get();
        return $query;

    }

}
