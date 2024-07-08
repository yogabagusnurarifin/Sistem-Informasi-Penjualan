<?php
function hari()
{
    $hari = date("D");

    switch ($hari) {
        case 'Sun':
            $hari_ini = "Minggu";
            break;

        case 'Mon':
            $hari_ini = "Senin";
            break;

        case 'Tue':
            $hari_ini = "Selasa";
            break;

        case 'Wed':
            $hari_ini = "Rabu";
            break;

        case 'Thu':
            $hari_ini = "Kamis";
            break;

        case 'Fri':
            $hari_ini = "Jumat";
            break;

        case 'Sat':
            $hari_ini = "Sabtu";
            break;

        default:
            $hari_ini = "Tidak di ketahui";
            break;
    }

    return $hari_ini;
}

function bulan()
{
    date_default_timezone_set("Asia/jakarta");
    // $jkt = date('H.i A');
    // $jam = date('H:i:s');
    // $hari = date('Y-m-d');
    $bulan = date('m');

    if ($bulan == '1') {
        $namabulan = 'Januari';
    } elseif ($bulan == '2') {
        $namabulan = 'Februari';
    } elseif ($bulan == '3') {
        $namabulan = 'Maret';
    } elseif ($bulan == '4') {
        $namabulan = 'April';
    } elseif ($bulan == '5') {
        $namabulan = 'Mei';
    } elseif ($bulan == '6') {
        $namabulan = 'Juni';
    } elseif ($bulan == '7') {
        $namabulan = 'Juli';
    } elseif ($bulan == '8') {
        $namabulan = 'Agustus';
    } elseif ($bulan == '9') {
        $namabulan = 'September';
    } elseif ($bulan == '10') {
        $namabulan = 'Oktober';
    } elseif ($bulan == '11') {
        $namabulan = 'November';
    } elseif ($bulan == '12') {
        $namabulan = 'Desember';
    }
    $nama = $namabulan;
    return $nama;
}

function rupiah($angka)
{
    $hasil_rupiah = "Rp. " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}
