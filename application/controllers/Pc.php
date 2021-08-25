<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pc extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // if ($this->session->userdata('applevel') != 1) {
        //     redirect('akses');
        // }
        date_default_timezone_set('Asia/Jakarta');
    }
    public function index()
    {
        // // Tampilan
        $this->load->view('template/head');
        $this->load->view('template/title');
        $this->load->view('template/css');
        $this->load->view('template/datatablecss');
        $this->load->view('template/body');
        // $this->load->view('template/notifikasi');
        $this->load->view('template/judulapp');
        $this->load->view('template/menu');
        // $this->load->view('template/judulpage');
        $this->load->view('template/isiatas');
        $this->load->view('pc/isi');
        $this->load->view('template/isiakhir');
        $this->load->view('template/footer');
        $this->load->view('template/js');
        $this->load->view('template/datatablejs');
        $this->load->view('template/sweetalert');

        $this->load->view('template/add');
        $this->load->view('template/end');
    }
}
