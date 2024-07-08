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
                            <form action="<?= base_url('laporan/pdfproduk') ?>" method="POST" target="_blank">
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
                                    <th>Kode Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Kategori</th>
                                    <th>Berat</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th>Gambar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $x = 1;
                                foreach ($produk as $p) : ?>
                                    <tr>
                                        <td><?= $x; ?></td>
                                        <td><?= $p->id_produk; ?></td>
                                        <td><?= $p->nama_produk; ?></td>
                                        <td><?= $p->nama_kategori; ?></td>
                                        <td><?= number_format($p->berat); ?></td>
                                        <td><?= number_format($p->stok); ?></td>
                                        <td><?= rupiah($p->harga); ?></td>
                                        <td>
                                            <img src="<?= base_url('assets/images/upload/produk/') ?><?= $p->foto; ?>" alt="Foto Produk" width="90px">
                                        </td>
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