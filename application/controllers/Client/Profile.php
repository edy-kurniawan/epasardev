<?php
class Profile extends CI_Controller{

    function __construct(){
        parent::__construct();
        if ($this->session->userdata['logged_user'] == TRUE)
        {
        
        }
        else
        {
            $this->session->set_flashdata('message', '<div style="color : red;">Login Terlebih Dahulu</div>');
            redirect(base_url('client/login'));
        }

         $this->load->helper(array('form', 'url')); 
         $this->load->model(array('DbHelper', 'M_profile')); 
         $this->load->library(array('form_validation','session'));
         $this->load->helper('security');
    }

    function index(){
        $this->load->view('template/client/head2');
        $this->load->view('Client/v_profile');
    }

    function get_user(){
        $username=$this->session->userdata("username");
        $data=$this->M_profile->get_data($username);
        echo json_encode($data);
    }

    public function ajax_edit()
    {
        $refuser=$this->session->userdata("username");
        $data = $this->M_barang->edit($refuser);
        echo json_encode($data);
    }

    function ajax_update(){
        $this->form_validation->set_rules('nama','nama','trim|required|xss_clean');
        $this->form_validation->set_rules('email','email','trim|required|xss_clean');
        $this->form_validation->set_rules('telp','ket','trim|required|min_length[8]xss_clean');
        $this->form_validation->set_rules('tgl','tgl','trim|required|xss_clean');
        $this->form_validation->set_rules('jenis','jenis','trim|required|xss_clean');
        
            if($this->form_validation->run() == false)
        {
            
        }
            else
        {
        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');
        $id = $this->security->sanitize_filename($this->input->post('id'));
        $nama = $this->security->sanitize_filename($this->input->post('nama'));
        $telp = $this->security->sanitize_filename($this->input->post('telp'));
        $jenis = $this->security->sanitize_filename($this->input->post('jenis'));
        $tgl = $this->security->sanitize_filename($this->input->post('tgl'));
        $email = $this->security->sanitize_filename($this->input->post('email'));

        $data = array(  
            "Nama"       => $nama,
            "Telp"       => $telp,
            "Jenis"       => $jenis,
            "Tgllahir"       => $tgl,
            "Dateu"      => $now
            );

            $where = array(
            'ID' => $id
            );
 
        $this->M_profile->update($where,$data);
        echo json_encode(array("status" => TRUE));

        $this->session->set_flashdata('message', '<br><font color="green">
                <i class="icon fa fa-check"></i>
                <strong>Data Berhasil Diupdate !</strong></font>
              ');

        redirect('client/profile');
            
        }
    }

    function img_update(){
       
        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s'); 
        $id = $this->security->sanitize_filename($this->input->post('id'));

            if(!empty($_FILES['photo']['name']))
            {
                $data = array(  
                    "Dateu"      => $now
                    );

                    $where = array(
                    'ID' => $id
                    );
                $upload = $this->_do_upload();
                $data['Img'] = $upload;

                $this->M_profile->update($where,$data);
                echo json_encode(array("status" => TRUE));

                if(file_exists('./assets/upload/user/'.$this->input->post('img')) && $this->input->post('img'))
                unlink('./assets/upload/user/'.$this->input->post('img'));

                redirect('client/profile'); 
            } else {
                if($this->input->post('remove_photo')) // if remove photo checked 
            {
                if(file_exists('./assets/upload/user/'.$this->input->post('img')) && $this->input->post('img'))
                unlink('./assets/upload/user/'.$this->input->post('img'));
                $data = array(  
                    "Img"      => "default.png",
                    "Dateu"      => $now
                    );

                    $where = array(
                    'ID' => $id
                    );
                
                $this->M_profile->update($where,$data);
                echo json_encode(array("status" => TRUE));
                redirect('client/profile'); 
            }
                redirect('client/profile'); 
            }

    }

    private function _do_upload()
    {
        $config['upload_path']          = './assets/upload/user/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000; //set max size allowed in Kilobyte
        $config['max_width']            = 1000; // set max width image allowed
        $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
 
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
 
        if(!$this->upload->do_upload('photo')) //upload and validate
        {
            $data['inputerror'][] = 'photo';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }

}
?>