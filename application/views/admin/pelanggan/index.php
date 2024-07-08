<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No. Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($pelanggan as $p) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $p['nama_pelanggan']; ?></td>
                                    <td><?= $p['alamat']; ?></td>
                                    <td><?= $p['no_telepon']; ?></td>
                                    <td><a href="<?= base_url('pelanggan_admin/delete/'); ?><?= $p['id_pelanggan'] ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')" class="btn btn-danger">Hapus</a></td>
                                </tr>
                            <?php $i++;
                            endforeach; ?>
                        </tbody>
                        <!-- <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </tfoot> -->
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>