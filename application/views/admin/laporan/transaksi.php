<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <form method="POST" action="">
                <?php if (isset($_POST['cari'])) : ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="awal">Tanggal Awal</label>
                            <input type="date" class="form-control" id="awal" name="awal" value="<?= $_POST['awal'] ?>" required />
                        </div>
                        <div class="col-sm-6">
                            <label for="akhir">Tanggal Akhir</label>
                            <input type="date" class="form-control" id="akhir" name="akhir" value="<?= $_POST['akhir'] ?>" required />
                        </div>
                    </div>
                    <button class="btn btn-secondary mt-3" name="cari">Cari</button>
                <?php else : ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="awal">Tanggal Awal</label>
                            <input type="date" class="form-control" id="awal" name="awal" required />
                        </div>
                        <div class="col-sm-6">
                            <label for="akhir">Tanggal Akhir</label>
                            <input type="date" class="form-control" id="akhir" name="akhir" required />
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3" name="cari">Cari</button>
                <?php endif ?>
            </form>
        </div>
    </div>
</div>

<?php if (isset($_POST['cari'])) : ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="btn-group mb-3">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Cetak
                        </button>
                        <div class="dropdown-menu">
                            <!-- <a class="dropdown-item" href="#"><i class="mdi mdi-file-excel text-success"></i>Excel</a> -->
                            <form action="<?= base_url('laporan/pdftransaksi/') ?>" method="POST" target="_blank">
                                <input type="text" name="awal" value="<?= $_POST['awal'] ?>" hidden>
                                <input type="text" name="akhir" value="<?= $_POST['akhir'] ?>" hidden>
                                <button class="dropdown-item"><i class="mdi mdi-file-pdf text-danger"></i> PDF</button>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode Transaksi</th>
                                    <th>Tanggal</th>
                                    <th>Id Pelanggan</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Alamat</th>
                                    <th>Total Harga</th>
                                    <th>Ongkos Kirim</th>
                                    <th>Total Bayar</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $x = 1;
                                foreach ($transaksi as $t) : ?>
                                    <tr>
                                        <td><?= $x; ?></td>
                                        <td><?= $t->id_transaksi; ?></td>
                                        <td><?= date('d M Y', strtotime($t->tanggal)); ?></td>
                                        <td><?= $t->id_pelanggan; ?></td>
                                        <td><?= $t->nama_pelanggan; ?></td>
                                        <td><?= $t->detail_alamat; ?></td>
                                        <td><?= rupiah($t->total_harga); ?></td>
                                        <td><?= rupiah($t->ongkir); ?></td>
                                        <td><?= rupiah($t->total_bayar); ?></td>
                                        <td><?= $t->status; ?></td>
                                    </tr>
                                <?php $x++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>