<?php
class M_profile extends CI_Model{

    function get_data($username){
        $hsl=$this->db->query("SELECT * FROM user WHERE Refuser='$username'");
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

}