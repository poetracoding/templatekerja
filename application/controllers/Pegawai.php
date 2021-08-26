<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('itusername') == null) {
            redirect('akses');
        }
        date_default_timezone_set('Asia/Jakarta');
    }
    public function index()
    {
        $this->form_validation->set_rules('txtnip', 'NIP', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->db->order_by('unit', 'ASC');
            $this->db->order_by('jabatan', 'ASC');
            $this->db->join('tblulp', 'tblulp.kodeulp=tblpegawai.unit');
            $data["pegawai"] = $this->db->get('tblpegawai')->result_array();

            $data["unit"] = $this->db->get('tblulp')->result_array();
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
            $this->load->view('pegawai/isi');
            $this->load->view('template/isiakhir');
            $this->load->view('template/footer');
            $this->load->view('template/js');
            $this->load->view('template/datatablejs');
            $this->load->view('template/sweetalert');

            $this->load->view('template/add');
            $this->load->view('template/end');
        } else {
            if ($this->session->userdata('itusername') == "tamu") {
                redirect();
            }
            $nip = strtoupper($this->input->post('txtnip'));
            $nama = strtoupper($this->input->post('txtnama'));
            $jabatan = strtoupper($this->input->post('txtjabatan'));
            $unit = $this->input->post('txtunit');
            $data = [
                "nip" => $nip,
                "nama" => $nama,
                "nohp" => "",
                "jabatan" => $jabatan,
                "unit" => $unit,
                "username" => "admin",
                "tgl" => date('Y-m-d H:i:s')
            ];
            $this->db->insert('tblpegawai', $data);
            redirect('pegawai');
        }
    }
}
