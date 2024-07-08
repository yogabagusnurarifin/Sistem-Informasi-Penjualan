<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_model extends CI_Model
{
    function getWhere($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function getCariProduk($keyword)
    {
        $query = "SELECT * FROM tb_produk JOIN tb_kategori ON tb_kategori.id_kategori = tb_produk.kategori WHERE nama_produk LIKE '%$keyword%' OR keterangan LIKE '%$keyword%' OR nama_kategori LIKE '%$keyword%' ";
        return $this->db->query($query)->result_array();
    }

    public function getDetailProduk($id)
    {
        $this->db->select('*');
        $this->db->from('tb_produk');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_produk.kategori');
        $this->db->where('id_produk', $id);
        return $this->db->get()->result_array();
    }

    public function idTransaksi()
    {
        date_default_timezone_set("Asia/jakarta");
        $jkt = date('H.i A');
        $jam = date('H:i:s');
        $hari = date('Y-m-d');
        $Thn = date('Y');
        $Bln = date('m');
        $where = "MONTH(tanggal) = '$Bln' AND YEAR(tanggal) = '$Thn'";
        $this->db->select('RIGHT(tb_transaksi.id_transaksi,2) as id_transaksi', FALSE);
        $this->db->where($where);
        $this->db->order_by('id_transaksi', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_transaksi');  //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //cek kode jika telah tersedia    
            $data = $query->row();
            $kode = intval($data->id_transaksi) + 1;
        } else {
            $kode = 1;  //cek jika kode belum terdapat pada table
        }
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodetampil = "TR" . date('dmy') . $batas;  //format kode
        return $kodetampil;
    }

    function getKeranjang($id)
    {

        $query = "SELECT * FROM tb_keranjang JOIN tb_produk ON tb_produk.id_produk = tb_keranjang.id_produk JOIN tb_kategori ON tb_kategori.id_kategori = tb_produk.kategori WHERE tb_keranjang.id_pelanggan = '$id' ";
        return $this->db->query($query)->result_array();
    }

    public function insertkeranjang()
    {
        $id_pelanggan = $_SESSION['idPelanggan'];
        $id_produk = $this->input->post('id_produk', true);
        $jumlah = $this->input->post('jumlah', true);
        // data produk
        $produk = $this->db->get_where('tb_produk', ['id_produk' => $id_produk])->row();
        $nama_produk = $produk->nama_produk;
        $berat = $produk->berat;
        $harga = $produk->harga;

        // cek apakah ada produk didalam keranjang (jika ada maka ditambah)
        $where = array(
            'id_pelanggan' => $id_pelanggan,
            'id_produk' => $id_produk,
        );
        $keranjang = $this->db->get_where('tb_keranjang', $where)->row();
        if (!empty($keranjang)) {
            $tambahJumlah = $jumlah + $keranjang->jumlah;
            $total_berat2 = $berat * $tambahJumlah;
            $total_harga2 = $harga * $tambahJumlah;

            $whereUpdate = array(
                'id_pelanggan' => $id_pelanggan,
                'id_produk' => $id_produk,
            );
            $dataUpdate = array(
                'jumlah' => $tambahJumlah,
                'total_berat' => $total_berat2,
                'total_harga' => $total_harga2,
            );

            $this->db->where($whereUpdate);
            $this->db->update('tb_keranjang', $dataUpdate);
        } else {
            $total_berat = $berat * $jumlah;
            $total_harga = $harga * $jumlah;
            $data = [
                "id_pelanggan" => $id_pelanggan,
                "id_produk" => $id_produk,
                "nama_produk" => $nama_produk,
                "berat" => $berat,
                "harga" => $harga,
                "jumlah" => $jumlah,
                "total_berat" => $total_berat,
                "total_harga" => $total_harga,
            ];

            $this->db->insert('tb_keranjang', $data);
        }
    }

    public function getTransaksiPelanggan()
    {
        $idLogin = $_SESSION['idPelanggan'];
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->order_by('id_transaksi', 'DESC');
        $this->db->where('id_pelanggan', $idLogin);
        return $this->db->get()->result_array();
    }

    public function getTransaksi($id)
    {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_transaksi.id_pelanggan');
        $this->db->where('tb_transaksi.id_transaksi', $id);
        return $this->db->get()->result_array();
    }

    public function getTransaksiDetail($id)
    {
        $query = "SELECT * FROM tb_detail_transaksi JOIN tb_produk ON tb_produk.id_produk = tb_detail_transaksi.id_produk JOIN tb_transaksi ON tb_transaksi.id_transaksi = tb_detail_transaksi.id_transaksi WHERE tb_detail_transaksi.id_transaksi = '$id' ";
        return $this->db->query($query)->result_array();
    }

    public function insertTransaksi()
    {
        date_default_timezone_set("Asia/jakarta");
        $jkt = date('H.i A');
        $jam = date('H:i:s');
        $hari = date('Y-m-d');


        $id_transaksi = $this->input->post('id_transaksi', true);
        $id_pelanggan = $_SESSION['idPelanggan'];
        $nama_penerima = $this->input->post('nama', true);
        $total_berat = $this->input->post('total_berat', true);
        $total_harga = $this->input->post('total_harga', true);
        $provinsi = $this->input->post('input_provinsi', true);
        $kodepos = $this->input->post('input_kodepos', true);
        $ekspedisi = $this->input->post('input_ekspedisi', true);
        $ongkir = $this->input->post('input_ongkir', true);
        $estimasi = $this->input->post('input_estimasi', true);
        $alamat = $this->input->post('alamat', true);
        $total_bayar = $this->input->post('total_bayar', true);
        $kode_unik = $this->input->post('kode_unik', true);
        $data = [
            "id_transaksi" => $id_transaksi,
            "tanggal" => $hari,
            "id_pelanggan" => $id_pelanggan,
            "nama_penerima" => $nama_penerima,
            "total_berat" => $total_berat,
            "total_harga" => $total_harga,
            "provinsi" => $provinsi,
            "kodepos" => $kodepos,
            "ekspedisi" => $ekspedisi,
            "ongkir" => $ongkir,
            "estimasi" => $estimasi,
            "detail_alamat" => $alamat,
            "total_bayar" => $total_bayar,
            "status" => 'Menunggu Pembayaran',
            "kode_unik" => $kode_unik
        ];

        $this->db->insert('tb_transaksi', $data);
    }

    public function insertDetailTransaksi()
    {
        $idLogin = $_SESSION['idPelanggan'];
        $id_transaksi = $this->input->post('id_transaksi', true);
        $query = "SELECT * FROM tb_keranjang WHERE tb_keranjang.id_pelanggan = '$idLogin' ";
        $get = $this->db->query($query)->result();

        $data = array();
        foreach ($get as $d) {
            array_push($data, array(
                'id_transaksi' => $id_transaksi,
                'id_produk' => $d->id_produk,
                'nama_produk' => $d->nama_produk,
                'berat' => $d->berat,
                'harga' => $d->harga,
                'jumlah' => $d->jumlah,
                'sub_berat' => $d->total_berat,
                'sub_total' => $d->total_harga,
            ));
        }
        $this->db->insert_batch('tb_detail_transaksi', $data);
    }

    public function batalkanPesanan($id)
    {
        // get data transaksi
        $transaksi = $this->db->get_where('tb_transaksi', ['id_transaksi' => $id])->result_array();
        // get data detail transaksi join produk
        $this->db->select('*');
        $this->db->from('tb_detail_transaksi');
        $this->db->join('tb_produk', 'tb_produk.id_produk = tb_detail_transaksi.id_produk');
        $this->db->where('tb_detail_transaksi.id_transaksi', $id);
        $produk =  $this->db->get()->result_array();

        foreach ($transaksi as $t) {
        }
        if ($t['status'] == 'Menunggu Pembayaran') {
            $data = array();
            foreach ($produk as $d) {
                array_push($data, array(
                    'id_produk' => $d['id_produk'],
                    'stok' => $d['stok'] + $d['jumlah'],
                ));
            }
            $this->db->update_batch('tb_produk', $data, 'id_produk');

            $this->db->set('status', 'Dibatalkan');
            $this->db->where('id_transaksi', $id);
            $this->db->update('tb_transaksi');
        }
    }

    public function insertPembayaran()
    {
        date_default_timezone_set("Asia/jakarta");
        $jkt = date('H.i A');
        $jam = date('H:i:s');
        $hari = date('Y-m-d');

        $foto = $_FILES['bukti']['name'];
        if ($foto = '') {
        } else {
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/images/upload/buktipembayaran/';
            $config['file_name'] = 'bukti-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('bukti')) {
                $this->upload->data('file_name');

                $data = [
                    "tanggal" => $hari,
                    "id_transaksi" => $this->input->post('id_transaksi', true),
                    "bank" => $this->input->post('bank', true),
                    "nama" => $this->input->post('nama', true),
                    "bukti" => $this->upload->data('file_name'),
                ];

                $this->db->insert('tb_pembayaran', $data);

                $this->db->set('status', 'Menunggu Konfirmasi');
                $this->db->where('id_transaksi', $this->input->post('id_transaksi', true));
                $this->db->update('tb_transaksi');
            } else {
                $id = $this->input->post('id_transaksi', true);
                echo "<script>alert('Upload gagal');window.location = '" . base_url("pelanggan/detailpesanan/$id") . "';</script>";
            }
        }
    }
}
