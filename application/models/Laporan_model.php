<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
    public function selectProduk()
    {
        date_default_timezone_set("Asia/jakarta");
        $jkt = date('H.i A');
        $jam = date('H:i:s');
        $hari = date('Y-m-d');

        $awal = $this->input->post('awal', true);
        $akhir = $this->input->post('akhir', true);

        $query = "SELECT * FROM tb_produk JOIN tb_kategori ON tb_kategori.id_kategori = tb_produk.kategori WHERE tb_produk.tanggal BETWEEN '$awal' AND '$akhir' GROUP BY tb_produk.id_produk ASC";
        return $this->db->query($query)->result();

        // $this->db->select('*');
        // $this->db->from('tb_produk');
        // $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_produk.kategori');
        // return $this->db->get()->result();

        // Produces:
        // SELECT * FROM blogs JOIN comments ON comments.id = blogs.id
    }

    public function selectTransaksi()
    {
        date_default_timezone_set("Asia/jakarta");
        $jkt = date('H.i A');
        $jam = date('H:i:s');
        $hari = date('Y-m-d');

        $awal = $this->input->post('awal', true);
        $akhir = $this->input->post('akhir', true);

        $query = "SELECT * FROM tb_transaksi JOIN tb_pelanggan ON tb_pelanggan.id_pelanggan = tb_transaksi.id_pelanggan WHERE tb_transaksi.tanggal BETWEEN '$awal' AND '$akhir' GROUP BY tb_transaksi.id_transaksi ASC";
        return $this->db->query($query)->result();
        // $query = $this->db->get('tb_transaksi');
        // return $query->result();
    }
}
