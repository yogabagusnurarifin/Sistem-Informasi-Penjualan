<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    // Menu Dashboard
    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('admin/templates/footer');
    }

    // Menu Transaksi
    public function transaksi()
    {
        $data['title'] = 'Transaksi / Pesanan';
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/transaksi/index', $data);
        $this->load->view('admin/templates/footer');
    }

    public function detailtransaksi()
    {
        $data['title'] = 'Detail Transaksi';
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/transaksi/detail', $data);
        $this->load->view('admin/templates/footer');
    }

    // Menu Produk
    public function kategoriproduk()
    {
        $data['title'] = 'Kategori Produk';
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/produk/kategori', $data);
        $this->load->view('admin/templates/footer');
    }

    public function produk()
    {
        $data['title'] = 'Produk';
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/produk/produk', $data);
        $this->load->view('admin/templates/footer');
    }

    // Menu Data Bank
    public function bank()
    {
        $data['title'] = 'Data Bank';
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/bank', $data);
        $this->load->view('admin/templates/footer');
    }

    // Menu Data Pelanggan
    public function datapelanggan()
    {
        $data['title'] = 'Data Pelanggan';
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/datapelanggan', $data);
        $this->load->view('admin/templates/footer');
    }

    // Menu Laporan
    public function laporanproduk()
    {
        $data['title'] = 'Laporan Produk Terjual';
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/laporan/produkterjual', $data);
        $this->load->view('admin/templates/footer');
    }

    public function laporanstok()
    {
        $data['title'] = 'Laporan Stok Produk';
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/laporan/stok', $data);
        $this->load->view('admin/templates/footer');
    }

    // Menu Chatting
    public function chat()
    {
        $data['title'] = 'Pesan';
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/chat/index', $data);
        $this->load->view('admin/templates/footer');
    }

    public function detailchat()
    {
        $data['title'] = 'Detail Pesan';
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/chat/detail', $data);
        $this->load->view('admin/templates/footer');
    }

    // Menu Setting
    public function setting()
    {
        $data['title'] = 'Setting';
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/setting', $data);
        $this->load->view('admin/templates/footer');
    }
}
