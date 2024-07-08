<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function numrows($tabel)
    {
        $query = $this->db->select()
            ->from($tabel)
            ->get();
        return $query->num_rows();
    }

    public function sum($table, $field)
    {
        $query = $this->db->select_sum($field)
            ->from($table)
            ->get();
        return $query->result();
    }

    // menu setting
    public function insertInformasi()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "alamat" => $this->input->post('alamat', true),
            "no_telepon" => $this->input->post('no_telepon', true),
            "email" => $this->input->post('email', true),
            "kota" => $this->input->post('input_kota', true),
        ];

        $this->db->insert('tb_informasi', $data);
    }

    public function updateInformasi()
    {
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $no_telepon = $this->input->post('no_telepon');
        $email = $this->input->post('email');
        $kota = $this->input->post('input_kota');

        $this->db->set('nama', $nama);
        $this->db->set('alamat', $alamat);
        $this->db->set('no_telepon', $no_telepon);
        $this->db->set('email', $email);
        $this->db->set('kota', $kota);
        $this->db->update('tb_informasi');
    }

    public function insertPesanan()
    {
        $data = [
            "cara_pemesanan" => $this->input->post('cara_pemesanan', true),
        ];

        $this->db->insert('tb_informasi', $data);
    }

    public function updatePesanan()
    {
        $cara_pemesanan = $this->input->post('cara_pemesanan');

        $this->db->set('cara_pemesanan', $cara_pemesanan);
        $this->db->update('tb_informasi');
    }
}
