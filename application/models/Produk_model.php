<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_model extends CI_Model
{
    // produk
    public function selectProduk()
    {
        $this->db->select('*');
        $this->db->from('tb_produk');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_produk.kategori');
        $this->db->order_by('id_produk', 'DESC');
        return $this->db->get()->result_array();

        // Produces:
        // SELECT * FROM blogs JOIN comments ON comments.id = blogs.id
    }

    public function idProduk()
    {
        date_default_timezone_set("Asia/jakarta");
        $jkt = date('H.i A');
        $jam = date('H:i:s');
        $hari = date('Y-m-d');
        $Thn = date('Y');
        $Bln = date('m');
        $where = "MONTH(tanggal) = '$Bln' AND YEAR(tanggal) = '$Thn'";
        $this->db->select('RIGHT(tb_produk.id_produk,2) as id_produk', FALSE);
        $this->db->where($where);
        $this->db->order_by('id_produk', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_produk');  //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //cek kode jika telah tersedia    
            $data = $query->row();
            $kode = intval($data->id_produk) + 1;
        } else {
            $kode = 1;  //cek jika kode belum terdapat pada table
        }
        $batas = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodetampil = "PR" . date('dmy') . $batas;  //format kode
        return $kodetampil;
    }

    public function insertProduk()
    {
        date_default_timezone_set("Asia/jakarta");
        $jkt = date('H.i A');
        $jam = date('H:i:s');
        $hari = date('Y-m-d');
        $foto = $_FILES['foto']['name'];
        if ($foto = '') {
        } else {
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/images/upload/produk/';
            $config['file_name'] = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto')) {
                $this->upload->data('file_name');
            } else {
                echo "Upload Gagal";
                die();
            }
        }

        $data = [
            "id_produk" => $this->input->post('id_produk', true),
            "nama_produk" => $this->input->post('nama', true),
            "kategori" => $this->input->post('kategori', true),
            "berat" => $this->input->post('berat', true),
            "harga" => $this->input->post('harga', true),
            "stok" => $this->input->post('stok', true),
            "keterangan" => $this->input->post('keterangan', true),
            "foto" => $this->upload->data('file_name'),
            "tanggal" => $hari,
        ];


        $this->db->insert('tb_produk', $data);
    }

    public function updateProduk()
    {

        $id = $this->input->post('id_produk');
        $nama = $this->input->post('nama');
        $kategori = $this->input->post('kategori');
        $berat = $this->input->post('berat');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $keterangan = $this->input->post('keterangan');

        // cek jika ada gambar yang akan diupload
        $data['gambar'] = $this->db->get_where('tb_produk', ['id_produk' => $this->input->post('id_produk')])->row_array();
        $upload_image = $_FILES['foto']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/images/upload/produk/';
            $config['file_name'] = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $old_image = $data['gambar']['foto'];
                if ($old_image != '') {
                    unlink(FCPATH . 'assets/images/upload/produk/' . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('foto', $new_image);
            } else {
                // echo $this->upload->display_errors();
                // $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect('admin/produk');
            }
        }

        $this->db->set('nama_produk', $nama);
        $this->db->set('kategori', $kategori);
        $this->db->set('berat', $berat);
        $this->db->set('harga', $harga);
        $this->db->set('stok', $stok);
        $this->db->set('keterangan', $keterangan);
        $this->db->where('id_produk', $id);
        $this->db->update('tb_produk');
    }

    // kategori
    public function insertkategori()
    {
        $data = [
            "nama_kategori" => $this->input->post('kategori', true),
        ];

        $this->db->insert('tb_kategori', $data);
    }

    public function updateKategori()
    {
        $kategori = $this->input->post('kategori');
        $id = $this->input->post('id_kategori');

        $this->db->set('nama_kategori', $kategori);
        $this->db->where('id_kategori', $id);
        $this->db->update('tb_kategori');
    }
}
