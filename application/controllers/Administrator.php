<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('itusername') == null) {
            redirect('akses');
        }
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Model');
    }
    public function index()
    {
        $data["totalulp"] = $this->db->count_all_results('tblulp');
        $data["myjob"] = $this->Model->myjob();
        $data["myjobbulan"] = $this->Model->myjobbulan();
        $data["pegawai"] = $this->db->count_all_results('tblpegawai');
        $data["userapp"] = $this->db->get_where('tbluser', ["username" => $this->session->userdata('itusername')])->row_array();
        // // Tampilan
        $this->load->view('template/head', $data);
        $this->load->view('template/title');
        $this->load->view('template/css');
        // $this->load->view('template/datatablecss');
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
        // $this->load->view('template/datatablejs');
        // $this->load->view('template/sweetalert');

        // $this->load->view('template/add');
        $this->load->view('template/end');
    }
    public function pesan()
    {
        $this->load->model('Model');
        $this->Model->kirimpesan('-522972089', 'hello semua');
    }
    public function users()
    {
        if ($this->session->userdata('itusername') != "admin") {
            redirect();
        }

        $this->form_validation->set_rules('txtusername', 'Username', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data["users"] = $this->db->get('tbluser')->result_array();
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
            $this->load->view('admin/user');
            $this->load->view('template/isiakhir');
            $this->load->view('template/footer');
            $this->load->view('template/js');
            $this->load->view('template/datatablejs');
            // $this->load->view('template/sweetalert');

            // $this->load->view('template/add');
            $this->load->view('template/end');
        } else {
            $data = [
                "username" => $this->input->post('txtusername'),
                "pass" => NULL,
                "nama" => $this->input->post('txtnama'),
                "level" => $this->input->post('txtlevel'),
                "aktif" => 1,
                "nohp" => 123
            ];
            $this->db->insert('tbluser', $data);
            redirect('administrator/users');
        }
    }
    public function reset($username)
    {
        if ($username != "admin") {
            if ($this->session->userdata('itusername') == "admin") {
                $this->db->set('pass', NULL);
                $this->db->where('username', $username);
                $this->db->update('tbluser');
            }
        }
        redirect('administrator/users');
    }
    public function aktifasi($username)
    {
        if ($username != "admin") {
            if ($this->session->userdata('itusername') == "admin") {
                $cek = $this->db->get_where('tbluser', ['username' => $username])->row_array();
                if ($cek["aktif"] == 1) {
                    $this->db->set('aktif', 0);
                } else {
                    $this->db->set('aktif', 1);
                }
                $this->db->where('username', $username);
                $this->db->update('tbluser');
            }
        }
        redirect('administrator/users');
    }
    public function delete($username)
    {
        if ($username != "admin") {
            if ($this->session->userdata('itusername') == "admin") {
                $this->db->delete('tbluser', ["username" => $username]);
            }
        }
        redirect('administrator/users');
    }
}
