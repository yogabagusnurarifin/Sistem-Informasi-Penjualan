<!-- Jumbotron -->
<section class="jumbotron text-center">
    <div class="container pb-3">
        <h1 class="display-5">Pesanan Saya</h1>
    </div>
</section>
<!-- Akhir Jumbotron -->

<div class="page-breadcrumb">
    <div class="col-12 d-flex no-block align-items-center">
        <div class="">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('pelanggan'); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Data Pesanan
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<!-- Container -->
<div class="container-fluid pt-2">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- <div class="border-top mb-3"></div> -->
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode Transaksi</th>
                                    <th>Tanggal</th>
                                    <!-- <th>Nama</th> -->
                                    <th>Total Harga</th>
                                    <th>Status</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($transaksi as $t) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $t['id_transaksi']; ?></td>
                                        <td><?= date('d-M-Y', strtotime($t['tanggal'])); ?></td>
                                        <!-- <td><?= $t['nama_penerima']; ?></td> -->
                                        <td><?= rupiah($t['total_bayar']); ?></td>
                                        <td><?= $t['status']; ?></td>
                                        <td>
                                            <a href="<?= base_url('pelanggan/detailpesanan/'); ?><?= $t['id_transaksi'] ?>" class="btn btn-info text-white">Detail</a>
                                            <?php if ($t['status'] == 'Menunggu Pembayaran') : ?>
                                                <a href="<?= base_url('pelanggan/batalkanpesanan/'); ?><?= $t['id_transaksi'] ?>" class="btn btn-danger text-white" onclick="return confirm('Anda yakin mau membatalkan pesanan ini ?')">Membatalkan Pesanan</a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php $i++;
                                endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Container -->