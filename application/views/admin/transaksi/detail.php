<div class="row">
    <div class="col-md-12">
        <div class="card card-body printableArea">
            <?php foreach ($transaksi as $t) : ?>
                <h3><b>TRANSAKSI</b> <span class="pull-right">#<?= $t['id_transaksi'] ?></span></h3>
                <hr />
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="pull-left">
                            <h3>Pembelian</h3>
                            <p class="text-muted ms-1 m-0">Tanggal : <?= date('d M Y', strtotime($t['tanggal'])); ?></p>
                            <p class="text-muted ms-1 m-0">Total Bayar : <?= rupiah($t['total_bayar']); ?></p>
                            <p class="text-muted ms-1">Status : <?= $t['status']; ?></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="pull-left">
                            <h3>Pelanggan</h3>
                            <p class="text-muted ms-1 m-0">Nama : <?= $t['nama_penerima']; ?></p>
                            <p class="text-muted ms-1 m-0">Alamat : <?= $t['detail_alamat']; ?></p>
                            <p class="text-muted ms-1">Telepon : <?= $t['no_telepon']; ?></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="pull-left">
                            <h3>Pengiriman</h3>
                            <p class="text-muted ms-1 m-0">Ekspedisi : <?= $t['ekspedisi']; ?></p>
                            <p class="text-muted ms-1 m-0">Ongkir : <?= rupiah($t['ongkir']); ?></p>
                            <p class="text-muted ms-1">Estimasi : <?= $t['estimasi']; ?></p>
                            <!-- <p class="mt-4">
                                <b>Invoice Date :</b>
                                <i class="mdi mdi-calendar"></i> 23rd Jan 2018
                            </p>
                            <p>
                                <b>Due Date :</b>
                                <i class="mdi mdi-calendar"></i> 25th Jan 2018
                            </p> -->
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="col-md-12">
                <div class="table-responsive mt-5" style="clear: both">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($detailtransaksi as $dt) :
                                $total = $dt['harga'] * $dt['jumlah'];
                            ?>
                                <tr>
                                    <td class="text-center"><?= $i; ?></td>
                                    <td><?= $dt['nama_produk']; ?></td>
                                    <td><?= $dt['nama_kategori']; ?></td>
                                    <td><?= $dt['jumlah']; ?></td>
                                    <td><?= rupiah($dt['harga']); ?></td>
                                    <td><?= rupiah($total); ?></td>
                                </tr>
                            <?php
                                $i++;
                            endforeach;
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td colspan="4">Sub Total :</td>
                                <td><?= rupiah($t['total_harga']); ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="col-md-12">
                <div class="pull-right mt-4 text-end">
                    <p>Ongkir : <?= rupiah($t['ongkir']); ?></p>
                    <p>Kode Unik : <?= $t['kode_unik']; ?></p>
                    <hr />
                    <h3><b>Total :</b><?= rupiah($t['total_bayar']); ?></h3>
                </div>
                <div class="clearfix"></div>
                <hr />
                <div class="text-end">
                    <?php if (!empty($bukti)) : ?>
                        <button type="button" class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#cekBuktiPembayaranModal<?= $t['id_transaksi'] ?>">
                            Cek Bukti Pembayaran
                        </button>
                    <?php endif; ?>
                    <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#ubahStatusModal">
                        Ubah Status
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Ubah Status -->
<div class="modal fade" id="ubahStatusModal" tabindex="-1" aria-labelledby="ubahStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ubahStatusModalLabel">Ubah Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php echo form_open('transaksi/updatestatus'); ?>
            <div class="modal-body">
                <input type="hidden" name="id_transaksi" value="<?= $dt['id_transaksi'] ?>" readonly>
                <!-- <label for="status" class="col-sm col-form-label">Status</label> -->
                <div class="col-sm">
                    <select name="status" id="status" class="form-control">
                        <option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
                        <option value="Dibatalkan">Dibatalkan</option>
                        <option value="Proses">Proses</option>
                        <option value="Dikirim">Dikirim</option>
                        <option value="Selesai">Selesai</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal ubah Status -->


<!-- Modal cek pembayaran -->
<div class="modal fade" id="cekBuktiPembayaranModal<?= $t['id_transaksi'] ?>" tabindex="-1" aria-labelledby="cekBuktiPembayaranModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cekBuktiPembayaranModalLabel">Cek Bukti Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- <img src="<?= base_url('assets/images/upload/buktipembayaran/'); ?><?= $dt['bukti'] ?>" alt="" width="100%"> -->
                <?php foreach ($bukti as $b) : ?>
                    <div class="el-card-item pb-0">
                        <div class="el-card-avatar el-overlay-1">
                            <img src="<?= base_url('assets/images/upload/buktipembayaran/'); ?><?= $b['bukti'] ?>" alt="bukti" width="100%" />
                            <div class="el-overlay">
                                <ul class="list-style-none el-info">
                                    <li class="el-item">
                                        <a class="btn default btn-outline image-popup-vertical-fit el-link" href="<?= base_url('assets/images/upload/buktipembayaran/'); ?><?= $b['bukti'] ?>"><i class="mdi mdi-magnify-plus"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>