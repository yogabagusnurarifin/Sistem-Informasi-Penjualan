<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php echo validation_errors(); ?>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambah">
                    Tambah Bank
                </button>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Bank</th>
                                <th>Nama Rekening</th>
                                <th>Nomor Rekening</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($bank as $b) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $b['nama_bank']; ?></td>
                                    <td><?= $b['nama_rekening']; ?></td>
                                    <td><?= $b['no_rekening']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#update<?= $b['id_bank']; ?>">
                                            Edit
                                        </button>
                                        <a href="<?= base_url('bank/delete/') ?><?= $b['id_bank']; ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')" class="btn btn-danger ">Hapus</a>
                                    </td>
                                </tr>

                                <!-- Modal update -->
                                <div class="modal fade" id="update<?= $b['id_bank']; ?>" tabindex="-1" aria-labelledby="update" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <?php echo form_open('bank/update'); ?>
                                            <input type="hidden" value="<?= $b['id_bank']; ?>" name="id_bank">
                                            <div class="modal-body">
                                                <label for="nama_bank" class="col-sm col-form-label">Nama Bank</label>
                                                <div class="col-sm">
                                                    <input type="text" class="form-control" id="nama_bank" name="nama_bank" value="<?= $b['nama_bank']; ?>">
                                                </div>
                                                <label for="nama_rekening" class="col-sm col-form-label">Nama Rekening</label>
                                                <div class="col-sm">
                                                    <input type="text" class="form-control" id="nama_rekening" name="nama_rekening" value="<?= $b['nama_rekening']; ?>">
                                                </div>
                                                <label for="nomor_rekening" class="col-sm col-form-label">Nomor Rekening</label>
                                                <div class="col-sm">
                                                    <input type="number" class="form-control" id="nomor_rekening" name="nomor_rekening" value="<?= $b['no_rekening']; ?>">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="tambah" class="btn btn-primary">Edit</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- end modal update -->

                            <?php $i++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Insert -->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php echo form_open('bank'); ?>
            <div class="modal-body">
                <label for="nama_bank" class="col-sm col-form-label">Nama Bank</label>
                <div class="col-sm">
                    <input type="text" class="form-control" id="nama_bank" name="nama_bank">
                </div>
                <label for="nama_rekening" class="col-sm col-form-label">Nama Rekening</label>
                <div class="col-sm">
                    <input type="text" class="form-control" id="nama_rekening" name="nama_rekening">
                </div>
                <label for="nomor_rekening" class="col-sm col-form-label">Nomor Rekening</label>
                <div class="col-sm">
                    <input type="number" class="form-control" id="nomor_rekening" name="nomor_rekening">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal insert -->