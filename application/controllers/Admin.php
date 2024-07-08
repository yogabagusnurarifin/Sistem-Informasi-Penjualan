<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('loginAdmin')) {
            redirect(base_url("login"));
        }

        $this->load->library('form_validation');
        $this->load->model('Admin_model', 'admin');
    }

    // Menu Dashboard
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['transaksi'] = $this->admin->numrows('tb_transaksi');
        $status = 'Dikirim';
        $data['trs'] = $this->db->get_where('tb_transaksi', array('status' => $status))->num_rows();
        $data['pelanggan'] = $this->admin->numrows('tb_pelanggan');
        $data['stok'] = $this->admin->sum('tb_produk', 'stok');

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('admin/templates/footer');
    }

    // Menu Setting
    public function setting()
    {
        $data['title'] = 'Setting';
        $data['info'] = $this->admin->numrows('tb_informasi');
        $data['informasi'] = $this->db->get('tb_informasi')->row();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/setting', $data);
        $this->load->view('admin/templates/footer');
    }

    public function simpanInformasi()
    {
        $data = $this->admin->numrows('tb_informasi');
        $this->form_validation->set_rules('nama', 'Nama');
        $this->form_validation->set_rules('alamat', 'Alamat');
        $this->form_validation->set_rules('no_telepon', 'No Telepon');
        $this->form_validation->set_rules('email', 'Email');
        if ($data == 0) {
            $this->admin->insertInformasi();
            // $this->session->set_flashdata('flash', 'Ditambah');
            redirect('admin/setting');
        } else {
            $this->admin->updateInformasi();
            // $this->session->set_flashdata('flash', 'Ditambah');
            redirect('admin/setting');
        }
    }

    public function simpanPemesanan()
    {
        $data = $this->admin->numrows('tb_informasi');
        $this->form_validation->set_rules('cara_pemesanan', 'Cara Pemesanan');
        if ($data == 0) {
            $this->admin->insertPesanan();
            // $this->session->set_flashdata('flash', 'Ditambah');
            redirect('admin/setting');
        } else {
            $this->admin->updatePesanan();
            // $this->session->set_flashdata('flash', 'Ditambah');
            redirect('admin/setting');
        }
    }

    public function provinsi()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: 1b927078373b19c913c86edd0ed6cfb0"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            // Hasilnya dalam bentuk json
            // kita koversi ke array
            $array_response = json_decode($response, TRUE);
            $dataprovinsi = $array_response['rajaongkir']['results'];

            // echo "<pre>";
            // print_r($dataprovinsi);
            // echo "</pre>";
            echo "<option value=''>-Pilih Provinsi-</option>";

            foreach ($dataprovinsi as $key => $tiap_provinsi) {
                echo "<option value='" . $tiap_provinsi['province_id'] . "' id_provinsi='" . $tiap_provinsi['province_id'] . "'>";
                echo $tiap_provinsi['province'];
                echo "</option>";
            }
        }
    }

    public function kota()
    {
        $id_provinsi_terpilih = $_POST['id_provinsi'];
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=" . $id_provinsi_terpilih,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: 1b927078373b19c913c86edd0ed6cfb0"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            // echo $response;
            // Menjadikan array dari json
            $array_response = json_decode($response, TRUE);
            $data_distrik = $array_response['rajaongkir']['results'];

            // echo "<pre>";
            // print_r($data_distrik);
            // echo "</pre>";

            echo "<option value=''>-Pilih Kabupaten / Kota-</option>";

            foreach ($data_distrik as $key => $tiap_distrik) {
                echo "<option value='
                ' id_kota='" . $tiap_distrik['city_id'] . "
                ' id_provinsi='" . $id_provinsi_terpilih . "
            '>";

                echo $tiap_distrik['type'] . " ";
                echo $tiap_distrik['city_name'];
                echo "</option>";
            }
        }
    }
}
