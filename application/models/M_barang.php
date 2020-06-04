<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang extends CI_Model{

    function __construct() {
        parent::__construct();
        
        $this->load->model('DbHelper');
    }

    /* Model for admin */

    function getSemua(){
        $sql    =   "SELECT
                        barang.ID,
                        barang.Kode,
                        barang.Nama,
                        barang.Stok,            
                        barang.Harga,
                        barang.Status,
                        barang.Satuan,
                        barang.Img,
                        barang.Ket,
                        toko.Nama toko,
                        kategori.Nama kat
                    FROM
                        barang left outer join toko
                        on barang.Reftoko=toko.Kode
                        left outer join kategori
                        on barang.Refkategori=kategori.Kode
                    ORDER BY
                        barang.Datei DESC";
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
                        barang.ID,
                        barang.Kode,
                        barang.Nama,
                        barang.Stok,            
                        barang.Harga,
                        barang.Status,
                        barang.Satuan,
                        barang.Ket,
                        barang.Img,
                        barang.Refkategori,
                        barang.Reftoko,
                        toko.Nama toko,
                        kategori.Nama kat
                    FROM
                        barang left outer join toko
                        on barang.Reftoko=toko.Kode
                        left outer join kategori
                        on barang.Refkategori=kategori.Kode
                        where barang.ID='$id'");

       return $query->row(); 
    }

     public function delete_by_kode($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('barang');
    }  
     public function update($where, $data)
    {
        $this->db->update('barang', $data, $where);
    }

    function countbarang(){

        $query = $this->db->query("SELECT count(Kode) jml from barang ");
        return $query->row();
    }

    function countnon(){

        $query = $this->db->query("SELECT count(Kode) jml from barang where Status ='F' ");
        return $query->row();
    }

    function countaktif(){

        $query = $this->db->query("SELECT count(Kode) jml from barang where Status ='T' ");
        return $query->row();
    }

    function countkat(){

        $query = $this->db->query("SELECT count(Kode) jml from kategori");
        return $query->row();
    }

    /* Model for client */

    function showbarang(){
        $hasil=$this->db->query("SELECT
                                    barang.ID,
                                    barang.Nama,
                                    barang.Stok,
                                    barang.Harga,
                                    barang.Satuan,
                                    barang.Img,
                                    kategori.Nama kat 
                                FROM
                                    barang
                                    LEFT OUTER JOIN toko ON barang.Reftoko = toko.Kode
                                    LEFT OUTER JOIN kategori ON barang.Refkategori = kategori.Kode 
                                WHERE
                                    barang.Status = 'T' 
                                AND 
                                    barang.Stok >='1'
                                ORDER BY 
                                    barang.Datei DESC
                                LIMIT 7 ");
        return $hasil;
    }


 

}
