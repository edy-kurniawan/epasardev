<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('M_dashboard');
    }

    public function index(){
        if ($this->session->userdata['logged'] == TRUE)
        {
            $this->load->view('dashboard/v_penjualan');
         }
        else
        {
            $this->session->set_flashdata('message', '<div style="color : red;">Login Terlebih Dahulu</div>');
            redirect('Login');
        }
    }

    public function welcome(){
        redirect('home');
   }

    public function error(){
        $this->load->view('errors/404');
   }


    public function getcount(){
		$prod 	= $this->M_dashboard->countproduct();
        $karyawan   = $this->M_dashboard->countkaryawan();
        $user   = $this->M_dashboard->countuser();
		echo json_encode(array(
			'prod'    => $prod->jml,
            'karyawan'    => $karyawan->jml,
            'user'    => $user->jml
			)
		);
	}

    public function gudang(){
        $prod   = $this->M_dashboard->countproduct();
        $supplier   = $this->M_dashboard->countsupplier();
        $total   = $this->M_dashboard->counttotal();
        $kategori   = $this->M_dashboard->countkategori();
        $chart   = $this->M_dashboard->countbarangmasuk();
        echo json_encode(array(
            'prod'    => $prod->jml,
            'supplier'    => $supplier->jml,
            'total'    => $total->jml,
            'kategori'    => $kategori->jml,
            'chart'   => $chart
            )
        );
    }
}
