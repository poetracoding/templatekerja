<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Posit extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // if ($this->session->userdata('applevel') != 1) {
        //     redirect('akses');
        // }
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Model');
    }
    public function index()
    {
        $this->form_validation->set_rules('txtnama', 'Nama', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->db->join('tblulp', 'tblulp.kodeulp=tblpegawai.unit');
            $this->db->order_by('unit', 'ASC');
            $this->db->order_by('nama', 'ASC');
            $data["pegawai"] = $this->db->get('tblpegawai')->result_array();


            $this->db->order_by('tgllapor', 'DESC');
            $this->db->join('tblulp', 'tblulp.kodeulp=tblposit.unit');
            $data["posit"] = $this->db->get('tblposit')->result_array();
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
            $this->load->view('posit/isi');
            $this->load->view('template/isiakhir');
            $this->load->view('template/footer');
            $this->load->view('template/js');
            $this->load->view('template/datatablejs');
            // $this->load->view('template/sweetalert');

            // $this->load->view('template/add');   
            $this->load->view('template/end');
        } else {

            $kode = "P" . date('YmdHis') . rand(10, 99);
            $this->db->join('tblulp', 'tblulp.kodeulp=tblpegawai.unit');
            $pegawai = $this->db->get_where('tblpegawai', ["nip" => $this->input->post('txtnama')])->row_array();
            $respon1 = $this->input->post('txtrespon1');
            $respon2 = $this->input->post('txtrespon2');
            $travel1 = $this->input->post('txttravel1');
            $travel2 = $this->input->post('txttravel2');
            $recovery1 = $this->input->post('txtrecovery1');
            $recovery2 = $this->input->post('txtrecovery2');
            $data = [
                "kodeposit" => $kode,
                "tgllapor" => $this->input->post('txttgl'),
                "respon" => $respon1 . ":" . $respon2 . ":00",
                "travel" => $travel1 . ":" . $travel2 . ":00",
                "recovery" => $recovery1 . ":" . $recovery2 . ":00",
                "jenis" => $this->input->post('txtjenis'),
                "keluhan" => $this->input->post('txtkeluhan'),
                "tindakan" => $this->input->post('txttindakan'),
                "nip" => $pegawai["nip"],
                "nama" => $pegawai["nama"],
                "unit" => $pegawai["unit"],
                "username" => $this->session->userdata('itusername'),
                "status" => 1,
            ];
            // var_dump($data);
            // die;
            $this->db->insert('tblposit', $data);
            $this->Model->kirimpesan('-522972089', "Tiket POSIT : " . $kode . " \n\nPekerjaan IT telah diselesaikan oleh:" . $this->session->userdata('itusername') . " !\n \nNama : " . $pegawai["nama"] . "\nUnit : " . $pegawai["namaulp"] . "\nKeluhan : " . $this->input->post('txtkeluhan') . "\nTindakan : " . $this->input->post('txttindakan'));
            redirect('posit');
        }
    }
    public function delete($kode = "")
    {
        if ($kode == "") {
            redirect();
        } else {
            $cek = $this->db->get_where('tblposit', ['kodeposit' => $kode])->row_array();
            if ($cek) {
                $this->db->delete('tblposit', ["kodeposit" => $kode]);
                redirect('posit');
            } else {
                redirect();
            }
        }
    }
}
