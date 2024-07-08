<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    function getData()
    {
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);
        $query = "SELECT * FROM tb_pelanggan WHERE username = '$username' AND password = '$password' ";
        return $this->db->query($query)->row();
    }

    public function idPelanggan()
    {
        $this->db->select('RIGHT(tb_pelanggan.id_pelanggan,2) as id_pelanggan', FALSE);
        $this->db->order_by('id_pelanggan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_pelanggan');  //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //cek kode jika telah tersedia    
            $data = $query->row();
            $kode = intval($data->id_pelanggan) + 1;
        } else {
            $kode = 1;  //cek jika kode belum terdapat pada table
        }
        $batas = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodetampil = "PLG" . $batas;  //format kode
        return $kodetampil;
    }

    public function insertPelanggan()
    {
        $id = $this->auth->idPelanggan();
        $username = $this->input->post('username', true);
        $query = "SELECT * FROM tb_pelanggan WHERE  username = '$username' ";
        $cek = $this->db->query($query)->num_rows();

        if ($cek > 0) {
            echo "<script>alert('Pelanggan sudah terdaftar!');window.location = '" . base_url('auth/registrasipelanggan') . "';</script>";
        } else {
            $data = [
                "id_pelanggan" => $id,
                "nama_pelanggan" => $this->input->post('nama_pelanggan', true),
                "alamat" => $this->input->post('alamat', true),
                "no_telepon" => $this->input->post('no_telepon', true),
                "username" => $username,
                "password" => $this->input->post('password', true),
            ];

            $this->db->insert('tb_pelanggan', $data);
        }
    }
}
