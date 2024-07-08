<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- <button type="button" class="btn btn-primary mb-3">
                    Tambah Transaksi
                </button> -->
                <!-- <div class="border-top mb-3"></div> -->
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode Transaksi</th>
                                <th>Tanggal</th>
                                <th>Nama Pelanggan</th>
                                <th>Total Harga</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($transaksi as $t) :
                            ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <th><?= $t->id_transaksi; ?></th>
                                    <th><?= date('d-m-Y', strtotime($t->tanggal)); ?></th>
                                    <th><?= $t->nama_penerima; ?></th>
                                    <th><?= rupiah($t->total_bayar); ?></th>
                                    <th><?= $t->status; ?></th>
                                    <td>
                                        <a href="<?= base_url('transaksi/detail/'); ?><?= $t->id_transaksi; ?>" class="btn btn-info">Detail</a>
                                        <a href="<?= base_url('transaksi/hapus/'); ?><?= $t->id_transaksi; ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            <?php
                                $i++;
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>