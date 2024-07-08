<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Barang</title>
    <style>
        .table {
            /* font-family: "Trebuchet MS", Arial, Helvetica, sans-serif; */
            font-family: 'Times New Roman', Times, serif;
            border-collapse: collapse;
            width: 100%;
        }

        #table td,
        #table th {
            border: 1px solid #ddd;
            padding: 2px;
        }

        #table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #table tr:hover {
            background-color: #ddd;
        }

        #table th {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: center;
            background-color: #279bc2;
            color: white;
        }

        .total {
            background-color: #279bc2;
            font-weight: bold;
            color: white;
        }

        .mb-3 {
            margin-bottom: 3rem;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .line-title {
            border: 0;
            border-style: inset;
            border-top: 1px solid #000;
        }

        img {
            width: 90px;
        }
    </style>
</head>

<body>
    <!-- <img src="assets/img/dinsoskabmadiun.jpg" style="position: absolute; width: 60px; height: auto;"> -->
    <table style="width: 100%;">
        <tr>
            <td align="center">
                <span style="line-height: 1.6; font-weight: bold;">
                    UD Sido Asih
                    <br>
                    JL. Bugangin, Banjarsari, Kec. Madiun Kabupaten Madiun
                </span>
            </td>
        </tr>
    </table>

    <hr class="line-title">
    <div class="text-center">
        <b><span>Laporan Transaksi</span></b>
    </div>
    <br>

    <!-- <span><?= date('d-m-Y', strtotime($this->input->post('awal', true))); ?> - <?= date('d-m-Y', strtotime($this->input->post('akhir', true))); ?></span> -->
    <table id="table" class="table mb-3">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Kode Transaksi</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Id Pelanggan</th>
                <th scope="col">Nama Pelanggan</th>
                <th scope="col">Alamat</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Ongkos Kirim</th>
                <th scope="col">Total Bayar</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            ?>
            <?php foreach ($transaksi as $t) : ?>
                <tr>
                    <td class="text-center"><?= $i . '.'; ?></td>
                    <td><?= $t->id_transaksi; ?></td>
                    <td><?= $t->tanggal; ?></td>
                    <td><?= $t->id_pelanggan; ?></td>
                    <td><?= $t->nama_penerima; ?></td>
                    <td><?= $t->detail_alamat; ?></td>
                    <td><?= rupiah($t->total_harga); ?></td>
                    <td><?= $t->ongkir; ?></td>
                    <td><?= rupiah($t->total_harga); ?></td>
                    <td><?= $t->status; ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
            <?php
            // $sum = 0;
            // foreach ($bsum as $ba) {
            //     $sum += $ba->total;
            // }
            ?>
            <!-- <tr>
                <td colspan="7" class="total">TOTAL :</td>
                <td class="total"><?= rupiah($sum); ?></td>
            </tr> -->
        </tbody>
    </table>

    <table class="table">
        <tr>
            <td colspan="8"></td>
            <td colspan="2" class="text-right">Madiun, <?= date('d') . ' ' . bulan() . ' ' . date('Y'); ?></td>
        </tr>
        <tr>
            <td colspan="8"></td>
            <td colspan="2" class="text-right">Pemilik</td>
        </tr>
        <tr>
            <td colspan="2" rowspan="4"><br></td>
        </tr>
        <tr>
            <td colspan="2"><br></td>
        </tr>
        <tr>
            <td colspan="2"><br></td>
        </tr>
        <tr>
            <td colspan="2"><br></td>
        </tr>
        <tr>
            <td colspan="8"></td>
            <td colspan="2" class="text-right">Salamun</td>
        </tr>
    </table>
</body>

</html>