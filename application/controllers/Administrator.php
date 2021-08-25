<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // if ($this->session->userdata('itusername') != null) {
        //     redirect('Administrator');
        // }
        date_default_timezone_set('Asia/Jakarta');
    }
    public function index()
    {
        $data["userapp"] = $this->db->get_where('tbluser', ["username" => $this->session->userdata('itusername')])->row_array();
        // // Tampilan
        $this->load->view('template/head', $data);
        $this->load->view('template/title');
        $this->load->view('template/css');
        $this->load->view('template/datatablecss');
        $this->load->view('template/body');
        // $this->load->view('template/notifikasi');
        $this->load->view('template/judulapp');
        $this->load->view('template/menu');
        // $this->load->view('template/judulpage');
        $this->load->view('template/isiatas');
        $this->load->view('template/isi');
        $this->load->view('template/isiakhir');
        $this->load->view('template/footer');
        $this->load->view('template/js');
        $this->load->view('template/datatablejs');
        $this->load->view('template/sweetalert');

        $this->load->view('template/add');
        $this->load->view('template/end');
    }
    public function pesan()
    {
        $this->load->model('Model');
        $this->Model->kirimpesan('-522972089', 'hello semua');
    }
}
