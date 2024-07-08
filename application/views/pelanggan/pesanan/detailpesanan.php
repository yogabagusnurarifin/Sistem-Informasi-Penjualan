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
                    <li class="breadcrumb-item"><a href="<?= base_url('pelanggan'); ?>">Data Pesanan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Detail Transaksi #TR001
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>



<!-- Container -->
<div class="container pt-2">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Pesanan & Pengiriman</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Produk</button>
        </li>
        <?php
        foreach ($transaksi as $cekstatus) {
        }
        if ($cekstatus['status'] != 'Dibatalkan') :
        ?>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Konfirmasi Pembayaran</button>
            </li>
        <?php endif; ?>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <div class="row">
                <?php foreach ($transaksi as $t) : ?>
                    <div class="col-lg-6">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Tanggal</td>
                                    <td>: <?= date('d M Y', strtotime($t['tanggal'])); ?></td>
                                </tr>
                                <tr>
                                    <td>Kode Transaksi</td>
                                    <td>: <?= $t['id_transaksi']; ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Penerima</td>
                                    <td>: <?= $t['nama_penerima']; ?></td>
                                </tr>
                                <!-- <tr>
                                    <td>No Telepon</td>
                                    <td>: <?= $t['no_telepon']; ?></td>
                                </tr> -->
                                <tr>
                                    <td>Alamat</td>
                                    <td>: <?= $t['detail_alamat']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Provinsi</td>
                                    <td>: <?= $t['provinsi']; ?></td>
                                </tr>
                                <tr>
                                    <td>Jasa Pengiriman</td>
                                    <td>: <?= strtoupper($t['ekspedisi']); ?></td>
                                </tr>
                                <tr>
                                    <td>Estimasi Waktu</td>
                                    <td>: <?= $t['estimasi']; ?></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td><?= $t['status']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Berat (gr)</th>
                            <th>Total Berat (gr)</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $x = 1;
                        $total = 0;
                        foreach ($detailtransaksi as $dt) : ?>
                            <tr>
                                <td><?= $x; ?></td>
                                <td><?= $dt['nama_produk']; ?></td>
                                <td><?= rupiah($dt['harga']); ?></td>
                                <td><?= $dt['jumlah']; ?></td>
                                <td><?= number_format($dt['berat']); ?> gram</td>
                                <td><?= number_format($dt['jumlah'] * $dt['berat']); ?> gram</td>
                                <td><?= rupiah($dt['sub_total']); ?></td>
                            </tr>
                        <?php $x++;
                        endforeach; ?>
                    <tfoot>
                        <tr>
                            <td colspan="6">Sub Total</td>
                            <td><?= rupiah($dt['total_harga']); ?></td>
                        </tr>
                        <tr>
                            <td colspan="6">Ongkir</td>
                            <td><?= rupiah($dt['ongkir']); ?></td>
                        </tr>
                        <tr>
                            <td colspan="6">Kode Unik</td>
                            <td><?= $dt['kode_unik']; ?></td>
                        </tr>
                        <tr class="table-info">
                            <td colspan="6">
                                <h5>Total :</h5>
                            </td>
                            <td>
                                <h5><?= rupiah($dt['total_bayar']); ?></h5>
                            </td>
                        </tr>
                    </tfoot>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
            <div class="alert alert-primary mt-3" role="alert">
                <div class="mb-3 fs-2">Total Yang Harus Dibayar : <?= rupiah($dt['total_bayar']); ?></div>
                <div class="mb-3">Info! Silakan Lakukan Pembayaran Ke :</div>
                <table>
                    <form action="<?= base_url('pelanggan/uploadbukti') ?>" method="post" enctype="multipart/form-data">
                        <?php foreach ($bank as $b) : ?>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <input class="form-check-input me-1" type="radio" name="bank" value="<?= $b['id_bank']; ?>" id="bank">
                                    <label class="form-check-label" for="bank"><?= $b['nama_bank']; ?> : <?= $b['no_rekening']; ?></label>
                                </li>
                            </ul>
                        <?php endforeach; ?>
                </table>
            </div>
            <div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <?php if (empty($bukti)) : ?>
                        Konfirmasi Pembayaran
                    <?php else : ?>
                        Lihat Pembayaran
                    <?php endif; ?>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Container -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php if (empty($bukti)) : ?>
                <!-- <form action="<?= base_url('pelanggan/uploadbukti') ?>" method="post" enctype="multipart/form-data"> -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_transaksi" value="<?= $t['id_transaksi'] ?>" readonly>
                    <input type="hidden" name="nama" value="<?= $t['nama_penerima'] ?>" readonly>
                    <div class="alert alert-warning" role="alert">
                        Ukuran file Makimal 2 Mb
                    </div>
                    <input type="file" name="bukti" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Konfirmasi</button>
                </div>
                </form>
            <?php else : ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php foreach ($bukti as $b) : ?>
                        <img src="<?= base_url('assets/images/upload/buktipembayaran/'); ?><?= $b['bukti'] ?>" alt="bukti" width="450px" />
                    <?php endforeach; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>