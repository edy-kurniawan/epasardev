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
                    'ID'    => html_escape($data->ID),
                    'Nama'  => html_escape($data->Nama),
                    'Jenis' => html_escape($data->Jenis),
                    'Alamat'=> html_escape($data->Alamat), 
                    'Tgllahir' => html_escape($data->Tgllahir),
                    'Telp'  => html_escape($data->Telp),
                    'Email' => html_escape($data->Email),
                    'Img'   => html_escape($data->Img),
                    'Prov'  => html_escape($data->prov),
                    'Kab'   => html_escape($data->kab),
                    'Kec'   => html_escape($data->kec),
                    'Kel'   => html_escape($data->kel),
                    );
            }
        }
        return $hasil;
    }

    public function get_from_order($refuser){

            $this->db->select('user.Nama, user.Alamat, user.Telp, user.Prov, user.Kab, user.Kec, user.Kel, provinsi.nama prov, kabupaten.nama kab, kecamatan.nama kec, kelurahan.nama kel');
            $this->db->from('user');
            $this->db->join('provinsi', 'provinsi.id_prov=user.Prov','left');
            $this->db->join('kabupaten', 'kabupaten.id_kab=user.Kab','left');
            $this->db->join('kecamatan', 'kecamatan.id_kec=user.Kec','left');
            $this->db->join('kelurahan', 'kelurahan.id_kel=user.Kel','left');
            $this->db->where('Refuser', $refuser);
            $query = $this->db->get();
            return $query;
        
    }

    public function verivy_kel($refuser){
        $this->db->select('kelurahan.ongkir');
        $this->db->from('kelurahan');
        $this->db->join('user', 'user.Kel=kelurahan.id_kel','left');
        $this->db->where('kelurahan.status', 't');
        $this->db->where('user.Refuser', $refuser);
        $hsl = $this->db->get();

        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'ongkir'    => html_escape($data->ongkir),
                    );
            }
        }else{
            $hasil=array(
                'ongkir'    => null,
                );
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