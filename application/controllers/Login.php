<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_model', 'auth');
    }
    public function index()
    {
        if ($this->session->userdata('loginAdmin')) {
            redirect(base_url("admin/admin"));
        }
        $this->load->view('auth/loginadmin');
    }

    function aksi_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where = array(
            'username' => $username,
            'password' => $password
        );
        $cek = $this->auth->cek_login("tb_admin", $where)->num_rows();
        $data = $this->auth->cek_login("tb_admin", $where)->row();
        $id = $data->id_admin;
        if ($cek > 0) {

            $data_session = array(
                'id_admin' => $id,
                'nama' => $username,
                'loginAdmin' => "loginAdmin"
            );

            $this->session->set_userdata($data_session);
            // redirect(base_url("admin"));
            echo "<script>alert('Login berhasil!');window.location = '" . base_url("admin") . "';</script>";
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username dan password salah !</div>');
            redirect('login');
        }
    }

    public function ubahPassword()
    {
        $data['admin'] = $this->db->get_where('tb_admin', ['id_admin' => $this->session->userdata('id_admin')])->row_array();

        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('password_baru', 'New Password', 'required|trim|min_length[3]|matches[password_baru2]');
        $this->form_validation->set_rules('password_baru2', 'Confirm New Password', 'required|trim|min_length[3]|matches[password_baru]');

        $password_lama = $this->input->post('password_lama');
        $password_baru = $this->input->post('password_baru');
        $password_baru2 = $this->input->post('password_baru2');

        if ($password_lama == $password_baru) {
            echo "<script>alert('Kata sandi baru tidak boleh sama dengan kata sandi saat ini!');window.location = '" . base_url("admin/setting") . "';</script>";
        } else {
            if ($password_baru == $password_baru2) {
                // password sudah ok/benar
                $this->db->set('password', $password_baru);
                $this->db->where('id_admin', $this->session->userdata('id_admin'));
                $this->db->update('tb_admin');

                echo "<script>alert('Password Berhasil Diubah');window.location = '" . base_url("admin/setting") . "';</script>";
            } else {
                echo "<script>alert('Kata sandi baru tidak sama dengan kata sandi konfirmasi!');window.location = '" . base_url("admin/setting") . "';</script>";
            }
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        // redirect(base_url('login'));
        echo "<script>alert('Berhasil Logout!');window.location = '" . base_url("login") . "';</script>";
    }
}
