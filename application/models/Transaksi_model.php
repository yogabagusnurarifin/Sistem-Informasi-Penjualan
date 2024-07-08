<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
    public function getTransaksi()
    {
        // $query = "SELECT * FROM tb_transaksi ORDER BY tanggal DESC ";
        // return $this->db->query($query)->result();
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->order_by('id_transaksi', 'DESC');
        return $this->db->get()->result();
    }

    public function transaksi($id)
    {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_transaksi.id_pelanggan');
        $this->db->where('id_transaksi', $id);
        return $this->db->get()->result_array();
    }

    public function detailTransaksi($id)
    {
        $query = "SELECT * FROM tb_detail_transaksi 
            JOIN tb_produk ON tb_produk.id_produk = tb_detail_transaksi.id_produk 
            JOIN tb_kategori ON tb_kategori.id_kategori = tb_produk.kategori 
            WHERE id_transaksi = '$id' ";
        return $this->db->query($query)->result_array();
    }

    public function updateStatus()
    {
        $status = $this->input->post('status');
        $id = $this->input->post('id_transaksi');
        $data['gambar'] = $this->db->get_where('tb_pembayaran', ['id_transaksi' => $id])->row_array();

        if ($status == 'Menunggu Pembayaran' or $status == 'Dibatalkan') {
            if ($data['gambar']['bukti'] != '') {
                unlink(FCPATH . 'assets/images/upload/buktipembayaran/' . $data['gambar']['bukti']);
            }
            $this->db->delete('tb_pembayaran', ['id_transaksi' => $id]);
        }

        $this->db->set('status', $status);
        $this->db->where('id_transaksi', $id);
        $this->db->update('tb_transaksi');
    }
}
