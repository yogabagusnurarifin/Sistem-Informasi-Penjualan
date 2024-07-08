<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('loginAdmin')) {
            redirect(base_url("login"));
        }
        $this->load->model('transaksi_model', 'transaksi');
    }

    public function index()
    {
        $data['title'] = 'Transaksi / Pesanan';
        $data['transaksi'] = $this->transaksi->getTransaksi();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/transaksi/index', $data);
        $this->load->view('admin/templates/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Transaksi';
        $data['transaksi'] = $this->transaksi->transaksi($id);
        $data['detailtransaksi'] = $this->transaksi->detailTransaksi($id);
        $data['bukti'] = $this->db->get_where('tb_pembayaran', ['id_transaksi' => $id])->result_array();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/transaksi/detail', $data);
        $this->load->view('admin/templates/footer');
    }

    public function updateStatus()
    {
        $id = $this->input->post('id_transaksi');
        $this->transaksi->updateStatus();
        echo "<script>alert('Berhasil dirubah');window.location = '" . base_url("transaksi/detail/$id") . "';</script>";
    }

    public function hapus($id)
    {
        $this->db->delete('tb_transaksi', array('id_transaksi' => $id));
        redirect("transaksi");
    }
}
