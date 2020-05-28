<?php
class M_profile extends CI_Model{

    function get_data($username){
        $hsl=$this->db->query(
                            "SELECT 
                                user.ID,
                                user.Nama,
                                user.Jenis,
                                user.Alamat,
                                user.Tgllahir,
                                user.Telp,
                                user.Email,
                                user.Img,
                                provinsi.nama prov,
                                kabupaten.nama kab,
                                kecamatan.nama kec,
                                kelurahan.nama kel
                            FROM user 
                                left outer join provinsi
                                on user.Prov=provinsi.id_prov
                                left outer join kabupaten
                                on user.Kab=kabupaten.id_kab
                                left outer join kecamatan
                                on user.Kec=kecamatan.id_kec
                                left outer join kelurahan
                                on user.Kel=kelurahan.id_kel
                            WHERE Refuser='$username'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'ID' => $data->ID,
                    'Nama' => $data->Nama,
                    'Jenis' => $data->Jenis,
                    'Alamat' => $data->Alamat, 
                    'Tgllahir' => $data->Tgllahir,
                    'Telp' => $data->Telp,
                    'Email' => $data->Email,
                    'Img' => $data->Img,
                    'Prov' => $data->prov,
                    'Kab' => $data->kab,
                    'Kec' => $data->kec,
                    'Kel' => $data->kel,
                    );
            }
        }
        return $hasil;
    }

    public function edit($refuser)
    {
     $query = $this->db->query("SELECT
                        user.ID,
                        user.Refuser,
                        user.Img
                    FROM
                        user
                    where 
                        user.Refuser='$refuser'");

       return $query->row(); 
    }

    public function update($where, $data)
    {
        $this->db->update('user', $data, $where);
    }

    function get_prov(){
        $query = $this->db->get('provinsi');
        return $query;  
    }

    function get_kab($id){
        $query = $this->db->get_where('kabupaten', array('id_prov' => $id));
        return $query;
    }

    function get_kec($id){
        $query = $this->db->get_where('kecamatan', array('id_kab' => $id));
        return $query;
    }

    function get_kel($id){
        $query = $this->db->get_where('kelurahan', array('id_kec' => $id));
        return $query;
    }
}