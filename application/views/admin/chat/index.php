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
                                <th>No. Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($chat as $c) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $c['nama_pelanggan']; ?></td>
                                    <td><?= $c['no_telepon']; ?></td>
                                    <td><a href="<?= base_url('chat/detail/'); ?><?= $c['id_pelanggan']; ?>" class="btn btn-primary">Detail</a>
                                        <a href="#" onclick="return confirm('Anda yakin mau menghapus item ini ?')" class="btn btn-danger">Hapus</a>
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