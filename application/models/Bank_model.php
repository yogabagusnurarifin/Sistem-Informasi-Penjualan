<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bank_model extends CI_Model
{
    public function insert()
    {
        $data = [
            "nama_bank" => $this->input->post('nama_bank', true),
            "nama_rekening" => $this->input->post('nama_rekening', true),
            "no_rekening" => $this->input->post('nomor_rekening', true),
        ];

        $this->db->insert('tb_bank', $data);
    }

    public function update()
    {
        $nama_bank = $this->input->post('nama_bank');
        $nama_rekening = $this->input->post('nama_rekening');
        $no_rekening = $this->input->post('nomor_rekening');
        $id = $this->input->post('id_bank');

        $this->db->set('nama_bank', $nama_bank);
        $this->db->set('nama_rekening', $nama_rekening);
        $this->db->set('no_rekening', $no_rekening);
        $this->db->where('id_bank', $id);
        $this->db->update('tb_bank');
    }
}
