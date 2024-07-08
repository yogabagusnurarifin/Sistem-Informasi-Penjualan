<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bank extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('loginAdmin')) {
            redirect(base_url("login"));
        }
        $this->load->model('Bank_model', 'bank');
    }
    public function index()
    {
        $data['title'] = 'Data Bank';
        $data['bank'] = $this->db->get('tb_bank')->result_array();

        $this->form_validation->set_rules('nama_bank', 'Bank', 'required');
        $this->form_validation->set_rules('nama_rekening', 'Rekening', 'required');
        $this->form_validation->set_rules('nomor_rekening', 'Nomor', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/bank/index', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $this->bank->insert();
            // $this->session->set_flashdata('flash', 'Ditambah');
            redirect('bank');
        }
    }

    public function update()
    {
        $this->form_validation->set_rules('nama_bank', 'Bank', 'required|trim');
        $this->form_validation->set_rules('nama_rekening', 'Rekening', 'required|trim');
        $this->form_validation->set_rules('nomor_rekening', 'Nomor', 'required|trim');

        $this->bank->update();
        // $this->session->set_flashdata('flash', 'Diedit');
        redirect('bank');
    }

    public function delete($id)
    {
        $this->db->delete('tb_bank', ['id_bank' => $id]);
        // $this->session->set_flashdata('flash', 'Dihapus');
        redirect('bank');
    }
}
