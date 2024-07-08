<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->library('form_validation');
        $this->load->model('Auth_model', 'auth');
    }
    public function index()
    {
        if ($this->session->userdata('loginPelanggan')) {
            redirect(base_url("pelanggan"));
        }
        $this->load->view('auth/loginpelanggan');
    }

    function loginPelanggan()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where = array(
            'username' => $username,
            'password' => $password
        );
        $data = $this->auth->getData();
        $id = $data->id_pelanggan;
        $cek = $this->auth->cek_login("tb_pelanggan", $where)->num_rows();
        if ($cek > 0) {

            $session_pelanggan = array(
                'idPelanggan' => $id,
                'namaPelanggan' => $username,
                'loginPelanggan' => "loginPelanggan"
            );

            $this->session->set_userdata($session_pelanggan);
            echo "<script>alert('Login berhasil!');window.location = '" . base_url('pelanggan') . "';</script>";
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username dan password salah !</div>');
            redirect('auth');
        }
    }

    // registrasi pelanggan
    public function registrasiPelanggan()
    {
        if ($this->session->userdata('loginPelanggan')) {
            redirect(base_url("pelanggan"));
        }

        $this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_telepon', 'Nomor', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/registrasipelanggan');
        } else {
            $this->auth->insertPelanggan();
            // $this->session->set_flashdata('flash', 'Ditambah');
            echo "<script>alert('Registrasi Berhasil, Silakan Login!');window.location = '" . base_url('auth') . "';</script>";
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        // redirect(base_url('pelanggan'));
        echo "<script>alert('Berhasil Logout!');window.location = '" . base_url("pelanggan") . "';</script>";
    }
}
