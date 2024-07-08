<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('loginAdmin')) {
            redirect(base_url("login"));
        }
        $this->load->model('Produk_model', 'produk');
    }

    public function index()
    {
        $data['title'] = 'Produk';
        $data['idProduk'] = $this->produk->idProduk();
        $data['produk'] = $this->produk->selectProduk();
        $data['kategori'] = $this->db->get('tb_kategori')->result();

        $this->form_validation->set_rules('id_produk', 'Id Produk', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('berat', 'Berat', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        // $this->form_validation->set_rules('foto', 'Foto', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/produk/index', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $this->produk->insertProduk();
            // $this->session->set_flashdata('flash', 'Ditambah');
            echo "<script>alert('Produk Berhasil Ditambah');window.location = '" . base_url("produk") . "';</script>";
            // redirect('produk');
        }
    }

    public function updateProduk()
    {
        $this->form_validation->set_rules('id_produk', 'Id Produk', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required|trim');
        $this->form_validation->set_rules('berat', 'Berat', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('stok', 'Stok', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
        // $this->form_validation->set_rules('foto', 'Foto', 'required|trim');

        $this->produk->updateProduk();
        // $this->session->set_flashdata('flash', 'Diedit');
        // redirect('produk');
        echo "<script>alert('Produk Berhasil Diubah');window.location = '" . base_url("produk") . "';</script>";
    }

    public function deleteProduk($id)
    {
        $item = $this->db->get_where('tb_produk', array('id_produk' => $id))->row();
        if ($item->foto != '') {
            unlink(FCPATH . 'assets/images/upload/produk/' . $item->foto);
        }
        $this->db->delete('tb_produk', ['id_produk' => $id]);
        // $this->session->set_flashdata('flash', 'Dihapus');
        // redirect('produk');
        echo "<script>alert('Produk Berhasil Dihapus');window.location = '" . base_url("produk") . "';</script>";
    }

    public function kategori()
    {
        $data['title'] = 'Kategori Produk';
        $data['kategori'] = $this->db->get('tb_kategori')->result_array();
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/produk/kategori', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $this->produk->insertkategori();
            // $this->session->set_flashdata('flash', 'Ditambah');
            // redirect('produk/kategori');
            echo "<script>alert('Kategori Berhasil Ditambah');window.location = '" . base_url("produk/kategori") . "';</script>";
        }
    }

    public function updateKategori()
    {
        $this->form_validation->set_rules('kategori', 'Kategori', 'required|trim');

        $this->produk->updateKategori();
        // $this->session->set_flashdata('flash', 'Diedit');zz
        // redirect('produk/kategori');
        echo "<script>alert('Kategori Berhasil Diubah');window.location = '" . base_url("produk/kategori") . "';</script>";
    }

    public function deleteKategori($id)
    {
        $this->db->delete('tb_kategori', ['id_kategori' => $id]);
        // $this->session->set_flashdata('flash', 'Dihapus');
        // redirect('produk/kategori');
        echo "<script>alert('Kategori Berhasil Dihapus');window.location = '" . base_url("produk/kategori") . "';</script>";
    }
}
