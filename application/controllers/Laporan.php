<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('loginAdmin')) {
            redirect(base_url("login"));
        }
        $this->load->model('Laporan_model', 'laporan');
    }

    public function index()
    {
        $data['title'] = 'Laporan Produk';
        $data['produk'] = $this->laporan->selectProduk();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/laporan/index', $data);
        $this->load->view('admin/templates/footer');
    }

    public function transaksi()
    {
        $data['title'] = 'Laporan Transaksi';
        $data['transaksi'] = $this->laporan->selectTransaksi();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/laporan/transaksi', $data);
        $this->load->view('admin/templates/footer');
    }

    public function pdfProduk()
    {
        $title = 'Laporan Produk';
        $this->load->library('pdf');
        $data['produk'] = $this->laporan->selectProduk();
        $view = $this->load->view('admin/laporan/cetakproduk', $data, true);
        $this->pdf->PdfGenerator($view, $title, 'F4', 'landscape');
    }

    public function pdfTransaksi()
    {
        $title = 'Laporan Transaksi';
        $this->load->library('pdf');
        $data['transaksi'] = $this->laporan->selectTransaksi();
        $view = $this->load->view('admin/laporan/cetaktransaksi', $data, true);
        $this->pdf->PdfGenerator($view, $title, 'F4', 'landscape');
    }
}
