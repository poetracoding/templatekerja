<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akses extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Model');
    }
    public function index()
    {
        // var_dump($this->session->userdata('itusername'));
        // die;
        if ($this->session->userdata('itusername') != null) {
            redirect('Administrator');
        }
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('login');
        } else {
            $this->_login();
        }
    }
    public function _login()
    {
        $username = strtolower($this->input->post('username'));
        $password = $this->input->post('password');

        $user = $this->db->get_where('tbluser', ['username' => $username])->row_array();

        // jika usernya ada
        if ($user) {
            // jika usernya aktif
            if ($user['aktif'] == 1) {
                if ($user['pass'] == null) {
                    $this->db->set('pass', password_hash($password, PASSWORD_DEFAULT));
                    $this->db->where('username', $username);
                    $this->db->update('tbluser');
                    $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Password berhasil di set,Silahkan Login!</div>');

                    $this->Model->kirimpesan('-522972089', "$username Berhasil setting Password! di Aplikasi Helpdesk IT");
                    redirect('Akses');
                } else {

                    if (password_verify($password, $user['pass'])) {

                        $data   = [
                            'itusername'   => $user["username"],
                            'itnama'       => $user["nama"],
                            'itlevel'      => $user["level"]
                        ];
                        $this->session->set_userdata($data);
                        $this->Model->kirimpesan('', "$username Berhasil login! di Aplikasi Helpdesk IT");

                        // $this->History_model->add($username, "Login Aplikasi");
                        redirect('Akses');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username/Password Salah!</div>');
                        redirect('Akses');
                    }
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User tidak aktif, silahkan hubungi Helpdesk!</div>');
                redirect('Akses');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username/Password Salah!</div>');
            redirect('Akses');
        }
    }
    public function logout()
    {
        // if ($this->session->userdata('itusername') == null) {
        //     redirect('home');
        // }

        // $this->History_model->add($this->session->userdata('itusername'), "Logout Aplikasi");
        $this->session->unset_userdata('itusername');
        $this->session->unset_userdata('itnama');
        $this->session->unset_userdata('itlevel');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil Logout!</div>');
        redirect('Akses');
    }
}
