<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php echo validation_errors(); ?>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal">
                    Tambah Produk
                </button>
                <div class="border-top mb-3"></div>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode Produk</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Berat</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Gambar</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($produk as $p) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $p['id_produk']; ?></td>
                                    <td><?= $p['nama_produk']; ?></td>
                                    <td><?= $p['nama_kategori']; ?></td>
                                    <td><?= $p['berat']; ?> gram</td>
                                    <td><?= rupiah($p['harga']); ?></td>
                                    <td><?= $p['stok']; ?></td>
                                    <td>
                                        <img width="90px" src="<?= base_url('assets/images/upload/produk/') . $p['foto']; ?>" alt="Produk">
                                    </td>
                                    <td><?= $p['keterangan']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-success text-white mb-1" data-bs-toggle="modal" data-bs-target="#update<?= $p['id_produk']; ?>">
                                            Edit
                                        </button>
                                        <a href="<?= base_url('produk/deleteProduk/') ?><?= $p['id_produk']; ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')" class="btn btn-danger mb-1 ">Hapus</a>
                                        <!-- <button class="btn btn-info">Tambah Stok</button> -->
                                    </td>
                                </tr>

                                <!-- Modal update -->
                                <div class="modal fade" id="update<?= $p['id_produk']; ?>" tabindex="-1" aria-labelledby="update" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <?php echo form_open_multipart('produk/updateproduk'); ?>
                                            <div class="modal-body">
                                                <label for="id_produk" class="col-sm col-form-label">Kode Produk</label>
                                                <div class="col-sm">
                                                    <input type="text" class="form-control" id="id_produk" name="id_produk" value="<?= $p['id_produk']; ?>" readonly>
                                                </div>
                                                <label for="_produk" class="col-sm col-form-label">Nama Produk</label>
                                                <div class="col-sm">
                                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $p['nama_produk']; ?>">
                                                </div>
                                                <label for="kategori" class="col-sm col-form-label">Kategori Produk</label>
                                                <div class="col-sm">
                                                    <select class="form-select" id="kategori" name="kategori">
                                                        <?php foreach ($kategori as $r) : ?>
                                                            <?php if ($r->id_kategori) : ?>
                                                                <option value="<?= $r->id_kategori ?>" <?= ($r->id_kategori == $p['kategori']) ? 'selected' : '' ?>><?= $r->nama_kategori ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <label for="berat" class="col-sm col-form-label">Berat</label>
                                                <div class="col-sm input-group">
                                                    <input type="number" class="form-control" id="berat" name="berat" value="<?= $p['berat']; ?>">
                                                    <span class="input-group-text" id="basic-addon2">gram</span>
                                                </div>
                                                <label for="harga" class="col-sm col-form-label">Harga</label>
                                                <div class="col-sm input-group">
                                                    <span class="input-group-text" id="basic-addon2">Rp.</span>
                                                    <input type="text" class="form-control" id="harga" name="harga" value="<?= $p['harga']; ?>">
                                                </div>
                                                <label for="stok" class="col-sm col-form-label">Stok</label>
                                                <div class="col-sm">
                                                    <input type="text" class="form-control" id="stok" name="stok" value="<?= $p['stok']; ?>">
                                                </div>
                                                <label for="foto" class="col-sm col-form-label">Gambar</label>
                                                <div class="row">
                                                    <img width="90px" src="<?= base_url('assets/images/upload/produk/') . $p['foto']; ?>" alt="Produk">
                                                    <div class="col-sm">
                                                        <input type="file" class="form-control" id="foto" name="foto" value="<?= $p['foto']; ?>">
                                                        <div class="alert alert-warning p-0 text-center" role="alert">
                                                            Ukuran file Makimal 2 Mb
                                                        </div>
                                                    </div>
                                                </div>
                                                <label for="keterangan" class="col-sm col-form-label">Keterangan</label>
                                                <div class="col-sm">
                                                    <textarea class="form-control" name="keterangan" id="keterangan" cols="60" rows="10"><?= $p['keterangan']; ?></textarea>
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
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php echo form_open_multipart('produk'); ?>
            <div class="modal-body">
                <label for="id_produk" class="col-sm col-form-label">Kode Produk</label>
                <div class="col-sm">
                    <input type="text" class="form-control" id="id_produk" name="id_produk" value="<?= $idProduk; ?>" readonly>
                </div>
                <label for="nama" class="col-sm col-form-label">Nama Produk</label>
                <div class="col-sm">
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>
                <label for="kategori" class="col-sm col-form-label">Kategori Produk</label>
                <div class="col-sm">
                    <select class="form-select" id="kategori" name="kategori">
                        <option selected>Pilih Kategori</option>
                        <?php foreach ($kategori as $k) : ?>
                            <option value="<?= $k->id_kategori ?>"><?= $k->nama_kategori ?></option>
                        <?php endforeach; ?>

                    </select>
                </div>
                <label for="berat" class="col-sm col-form-label">Berat</label>
                <div class="col-sm input-group">
                    <input type="number" class="form-control" id="berat" name="berat">
                    <span class="input-group-text" id="basic-addon2">gram</span>
                </div>
                <label for="harga" class="col-sm col-form-label">Harga</label>
                <div class="col-sm input-group">
                    <span class="input-group-text" id="basic-addon2">Rp.</span>
                    <input type="number" class="form-control" id="harga" name="harga">
                </div>
                <label for="stok" class="col-sm col-form-label">Stok</label>
                <div class="col-sm">
                    <input type="text" class="form-control" id="stok" name="stok">
                </div>
                <label for="foto" class="col-sm col-form-label">Foto</label>
                <div class="col-sm">
                    <input type="file" class="form-control" id="foto" name="foto">
                    <div class="alert alert-warning p-0 text-center" role="alert">
                        Ukuran file Makimal 2 Mb
                    </div>
                </div>
                <label for="keterangan" class="col-sm col-form-label">Keterangan</label>
                <div class="col-sm">
                    <textarea class="form-control" name="keterangan" id="keterangan" cols="60" rows="10"></textarea>
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