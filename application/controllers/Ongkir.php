<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ongkir extends CI_Controller
{
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
                ' provinsi='" . $tiap_distrik['province'] . "
                ' kota='" . $tiap_distrik['city_name'] . "
                ' kabupaten_kota='" . $tiap_distrik['type'] . "
                ' kodepos='" . $tiap_distrik['postal_code'] . "
            '>";

                echo $tiap_distrik['type'] . " ";
                echo $tiap_distrik['city_name'];
                echo "</option>";
            }
        }
    }

    public function ekspedisi()
    {
        echo "<option value=''>-Pilih Ekspedisi-</option>";
        echo "<option value='pos'>Pos Indonesia</option>";
        echo "<option value='tiki'>TIKI</option>";
        echo "<option value='jne'>JNE</option>";
    }

    public function paket()
    {
        $getkota = $this->db->get_where('tb_informasi', ['id' => '1'])->result_array();
        foreach ($getkota as $gk) {
        }
        $origin =  $gk['kota'];

        $ekspedisi = $_POST['ekspedisi'];
        $kota = $_POST['kota'];
        $berat = $_POST['berat'];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=" . $origin . "&destination=" . $kota . "&weight=" . $berat . "&courier=" . $ekspedisi,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
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

            // Dijadikan ke array
            $array_response = json_decode($response, TRUE);

            $paket = $array_response['rajaongkir']['results']['0']['costs'];

            // echo "<pre>";
            // print_r($paket);
            // echo "</pre>";

            echo "<option value=''>-Pilih Paket-</option>";

            foreach ($paket as $key => $tiap_paket) {
                $ongkir = $tiap_paket['cost']['0']['value'];
                echo "<option 
                    paket='" . $tiap_paket['service'] . "' 
                    ongkir='" . $ongkir . "' 
                    etd='" . $tiap_paket['cost']['0']['etd'] . "'>";
                echo $tiap_paket['service'] . " ";
                echo "Rp." . number_format($ongkir) . ",- ";
                echo $tiap_paket['cost']['0']['etd'];
                echo "</option>";
            }
        }
    }
}
