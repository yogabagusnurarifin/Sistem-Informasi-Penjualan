<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('loginAdmin')) {
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $data['title'] = 'Data Pelanggan';
        $data['pelanggan'] = $this->db->get('tb_pelanggan')->result_array();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/pelanggan/index', $data);
        $this->load->view('admin/templates/footer');
    }

    public function delete($id)
    {
        $this->db->delete('tb_pelanggan', ['id_pelanggan' => $id]);
        // $this->session->set_flashdata('flash', 'Dihapus');
        redirect('pelanggan_admin');
    }
}
