<div class="row">
    <div class="col-12">
        <div class="card col-lg-8">
            <div class="card-body">
                <?php echo validation_errors(); ?>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#kategoriModal">
                    Tambah Kategori
                </button>
                <div class="border-top mb-3"></div>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($kategori as $k) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $k['nama_kategori']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#updatekategori<?= $k['id_kategori']; ?>">
                                            Edit
                                        </button>
                                        <a href="<?= base_url('produk/deleteKategori/') ?><?= $k['id_kategori']; ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')" class="btn btn-danger ">Hapus</a>
                                    </td>
                                </tr>

                                <!-- Modal update -->
                                <div class="modal fade" id="updatekategori<?= $k['id_kategori']; ?>" tabindex="-1" aria-labelledby="updatekategori" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <?php echo form_open('produk/updatekategori'); ?>
                                            <input type="hidden" value="<?= $k['id_kategori']; ?>" name="id_kategori">
                                            <div class="modal-body">
                                                <label for="kategori" class="col-sm col-form-label">Nama Kategori</label>
                                                <div class="col-sm">
                                                    <input type="text" class="form-control" id="kategori" name="kategori" value="<?= $k['nama_kategori']; ?>">
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
<div class="modal fade" id="kategoriModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php echo form_open('produk/kategori'); ?>
            <div class="modal-body">
                <label for="kategori" class="col-sm col-form-label">Nama Kategori</label>
                <div class="col-sm">
                    <input type="text" class="form-control" id="kategori" name="kategori">
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