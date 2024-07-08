<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('loginAdmin')) {
            redirect(base_url("login"));
        }
        $this->load->model('Chatting_model', 'chat');
    }

    public function index()
    {
        $data['title'] = 'Pesan';
        $data['chat'] = $this->db->get('tb_pelanggan')->result_array();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/chat/index', $data);
        $this->load->view('admin/templates/footer');
    }

    public function detail($idPelanggan)
    {
        $data['title'] = 'Detail Pesan';
        $data['pelanggan'] = $this->db->get_where('tb_pelanggan', ['id_pelanggan' => $idPelanggan])->result_array();
        $data['isiPesan'] = $this->chat->getChatsAdmin($idPelanggan);
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/chat/detail', $data);
        $this->load->view('admin/templates/footer');
    }

    public function insertChat()
    {
        $this->chat->insertChat();
    }
}
