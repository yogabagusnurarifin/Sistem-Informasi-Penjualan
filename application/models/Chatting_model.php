<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chatting_model extends CI_Model
{
    public function getChatsAdmin($idPelanggan)
    {
        $idAdmin = $this->session->userdata('id_admin');
        $sql = "SELECT * FROM tb_pesan
           WHERE (dari='$idPelanggan' AND untuk='$idAdmin')
           OR    (untuk='$idPelanggan' AND dari='$idAdmin')
           ORDER BY id_pesan ASC";
        $q =  $this->db->query($sql)->result_array();
        return $q;
    }

    public function getChatsPelanggan()
    {
        $idPelanggan = $this->session->userdata('idPelanggan');
        $idAdmin = 1;
        $sql = "SELECT * FROM tb_pesan
           WHERE (dari='$idPelanggan' AND untuk='$idAdmin')
           OR    (untuk='$idPelanggan' AND dari='$idAdmin')
           ORDER BY id_pesan ASC";
        $q =  $this->db->query($sql)->result_array();
        return $q;
    }

    public function insertChat()
    {
        if (
            isset($_POST['pesan']) &&
            isset($_POST['dari']) &&
            isset($_POST['untuk'])
        ) {

            // $dari = $this->session->userdata('idPelanggan');
            $pesan = $_POST['pesan'];
            $dari = $_POST['dari'];
            $untuk = $_POST['untuk'];

            date_default_timezone_set("Asia/jakarta");
            // $time = date("H:i:s");
            // $time = date("CCYY-MM-DD hh:mm:ss");
            $time = date("Y-m-d H:m:s");
            $data = array(
                'dari' => $dari,
                'untuk' => $untuk,
                'tanggal' => $time,
                'pesan' => $pesan,
            );
            $this->db->insert('tb_pesan', $data);

            echo "
            <ul class='chat-list'>
            <li class='odd chat-item'>
                <div class='chat-content'>
                    <div class='box bg-light-inverse'>
                        " . $pesan . "
                    </div>
                    <br />
                </div>
                <div class='chat-time'>
                    " . date('d-m-Y H:m', strtotime($time)) . "
                </div>
            </li>
            </ul>
            ";
        }
    }
}
