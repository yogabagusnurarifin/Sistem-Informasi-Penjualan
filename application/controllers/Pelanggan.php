<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model', 'auth');
        $this->load->model('Pelanggan_model', 'pelanggan');
        $this->load->model('Chatting_model', 'chat');
    }

    public function index()
    {
        $data['title'] = 'Home';
        $data['kategori'] = $this->db->get('tb_kategori')->result_array();
        $data['informasi'] = $this->db->get('tb_informasi')->result_array();

        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        if ($this->form_validation->run() == false) {
            $data['produk'] = $this->db->get('tb_produk')->result_array();
            $this->load->view('pelanggan/templates/header');
            $this->load->view('pelanggan/templates/navbar', $data);
            $this->load->view('pelanggan/index', $data);
            $this->load->view('pelanggan/templates/footer');
        } else {
            $kategori = $this->input->post('kategori', true);
            $data['produk'] = $this->db->get_where('tb_produk', ['kategori' => $kategori])->result_array();
            $this->load->view('pelanggan/templates/header');
            $this->load->view('pelanggan/templates/navbar', $data);
            $this->load->view('pelanggan/index', $data);
            $this->load->view('pelanggan/templates/footer');
        }
    }

    public function cariProduk()
    {
        $data['title'] = 'Home';
        $cari = $this->input->post('cari', true);
        $data['kategori'] = $this->db->get('tb_kategori')->result_array();
        $data['produk'] = $this->pelanggan->getCariProduk($cari);
        $this->load->view('pelanggan/templates/header');
        $this->load->view('pelanggan/templates/navbar', $data);
        $this->load->view('pelanggan/cariproduk', $data);
        $this->load->view('pelanggan/templates/footer');
    }

    public function detailProduk($id)
    {
        $data['title'] = 'Detail Produk';
        // $data['produk'] = $this->db->get_where('tb_produk', ['id_produk' => $id])->result_array();
        $data['produk'] = $this->pelanggan->getDetailProduk($id);

        $this->load->view('pelanggan/templates/header');
        $this->load->view('pelanggan/templates/navbar', $data);
        $this->load->view('pelanggan/detailproduk', $data);
        $this->load->view('pelanggan/templates/footer');
    }

    public function carapemesanan()
    {
        $data['title'] = 'Cara Pemesanan';
        $data['info'] = $this->db->get('tb_informasi')->result_array();
        $this->load->view('pelanggan/templates/header');
        $this->load->view('pelanggan/templates/navbar', $data);
        $this->load->view('pelanggan/carapemesanan', $data);
        $this->load->view('pelanggan/templates/footer');
    }

    public function informasi()
    {
        $data['title'] = 'Informasi';
        $data['info'] = $this->db->get('tb_informasi')->result_array();
        $this->load->view('pelanggan/templates/header');
        $this->load->view('pelanggan/templates/navbar', $data);
        $this->load->view('pelanggan/informasi', $data);
        $this->load->view('pelanggan/templates/footer');
    }

    public function beli()
    {
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $stok = $this->input->post('stok', true);
        $jumlah = $this->input->post('jumlah', true);
        if ($this->session->userdata('loginPelanggan')) {
            if ($jumlah > $stok) {
                echo "<script>alert('Stok Produk Tidak Cukup');window.location = '" . base_url('pelanggan') . "';</script>";
            } else {
                $this->pelanggan->insertkeranjang();
                echo "<script>alert('Produk Masuk Ke keranjang belanja');window.location = '" . base_url('pelanggan') . "';</script>";
            }
        } else {
            echo "<script>alert('Silakan login terlebih dahulu!');window.location = '" . base_url('auth') . "';</script>";
        }
    }

    public function keranjang()
    {
        if (!$this->session->userdata('loginPelanggan')) {
            redirect(base_url("auth"));
        }

        $idLogin = $_SESSION['idPelanggan'];
        $data['title'] = 'Keranjang';
        $where = array('id_pelanggan' => $idLogin);
        $data['keranjang'] = $this->pelanggan->getKeranjang($idLogin);

        $this->load->view('pelanggan/templates/header');
        $this->load->view('pelanggan/templates/navbar', $data);
        $this->load->view('pelanggan/pesanan/keranjang', $data);
        $this->load->view('pelanggan/templates/footer');
    }

    public function hapusKeranjang($id)
    {
        $this->db->delete('tb_keranjang', array('id_keranjang' => $id));
        redirect("pelanggan/keranjang");
    }

    public function buatPesanan()
    {
        if (!$this->session->userdata('loginPelanggan')) {
            redirect(base_url("auth"));
        }
        $idLogin = $_SESSION['idPelanggan'];
        $data['title'] = 'Buat Pesanan';
        $data['idTransaksi'] = $this->pelanggan->idTransaksi();
        $where = array('id_pelanggan' => $idLogin);
        $data['keranjang'] = $this->pelanggan->getKeranjang($idLogin);

        $this->load->view('pelanggan/templates/header');
        $this->load->view('pelanggan/templates/navbar', $data);
        $this->load->view('pelanggan/pesanan/buatpesanan', $data);
        $this->load->view('pelanggan/templates/ongkir');
        $this->load->view('pelanggan/templates/footer');
    }

    public function inputTransaksi()
    {
        if (!$this->session->userdata('loginPelanggan')) {
            redirect(base_url("auth"));
        }
        $idLogin = $_SESSION['idPelanggan'];
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('ekspedisi', 'Ekspedisi', 'required');

        $this->pelanggan->insertTransaksi();
        $this->pelanggan->insertDetailTransaksi();
        $this->db->delete('tb_keranjang', array('id_pelanggan' => $idLogin));
        // redirect("pelanggan/datapesanan");
        echo "<script>alert('Pesanan berhasil dibuat, Silakan Lakukan Pembayaran!');window.location = '" . base_url("pelanggan/datapesanan") . "';</script>";
    }

    public function dataPesanan()
    {
        if (!$this->session->userdata('loginPelanggan')) {
            redirect(base_url("auth"));
        }
        $data['title'] = 'Data Pesanan';
        $data['transaksi'] = $this->pelanggan->getTransaksiPelanggan();
        $this->load->view('pelanggan/templates/header');
        $this->load->view('pelanggan/templates/navbar', $data);
        $this->load->view('pelanggan/pesanan/datapesanan', $data);
        $this->load->view('pelanggan/templates/footer');
    }

    public function batalkanPesanan($id)
    {
        $this->pelanggan->batalkanPesanan($id);
        redirect(base_url("pelanggan/dataPesanan"));
        // echo "<script>alert('Upload berhasil');window.location = '" . base_url("pelanggan/detailpesanan/$id") . "';</script>";
    }

    public function detailPesanan($id)
    {
        if (!$this->session->userdata('loginPelanggan')) {
            redirect(base_url("auth"));
        }
        $idLogin = $_SESSION['idPelanggan'];
        $data['title'] = 'Detail Pesanan';
        $data['transaksi'] = $this->pelanggan->getTransaksi($id);
        $data['detailtransaksi'] = $this->pelanggan->getTransaksiDetail($id);
        $data['bank'] = $this->db->get('tb_bank')->result_array();
        $data['bukti'] = $this->db->get_where('tb_pembayaran', ['id_transaksi' => $id])->result_array();

        $this->load->view('pelanggan/templates/header');
        $this->load->view('pelanggan/templates/navbar', $data);
        $this->load->view('pelanggan/pesanan/detailpesanan', $data);
        $this->load->view('pelanggan/templates/footer');
    }

    public function uploadBukti()
    {
        $id = $this->input->post('id_transaksi', true);
        $id_bank = $this->input->post('id_bank', true);
        $this->form_validation->set_rules('bukti', 'Bukti');
        $this->form_validation->set_rules('nama', 'Nama');
        $this->pelanggan->insertPembayaran();
        // $this->session->set_flashdata('flash', 'Ditambah');
        echo "<script>alert('Upload berhasil');window.location = '" . base_url("pelanggan/detailpesanan/$id") . "';</script>";
    }

    public function pesan()
    {
        if (!$this->session->userdata('loginPelanggan')) {
            redirect(base_url("auth"));
        }
        // $idLogin = $_SESSION['idPelanggan'];
        $data['title'] = 'Pesan';
        $data['isiPesan'] = $this->chat->getChatsPelanggan();
        $this->load->view('pelanggan/templates/header');
        $this->load->view('pelanggan/templates/navbar', $data);
        $this->load->view('pelanggan/chat/pesan', $data);
        $this->load->view('pelanggan/templates/footer');
    }

    public function insertChat()
    {
        if (!$this->session->userdata('loginPelanggan')) {
            redirect(base_url("auth"));
        }
        $this->chat->insertChat();
    }
}
