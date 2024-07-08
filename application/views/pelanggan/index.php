<!-- Jumbotron -->
<section class="jumbotron text-center">
    <div class="container pb-3">
        <?php foreach ($informasi as $info) : ?>
            <h1 class="display-5"><?= $info['nama']; ?></h1>
            <h3 class="lead"><?= $info['alamat']; ?></h3>
            <!-- <h3 class="lead">Jl. Bugangin, Banjarsari, Kecamatan Madiun kabupaten Madiun, Jawa Timur 63151</h3> -->
            <h3 class="lead">Email : <?= $info['email']; ?> / Telepon : <?= $info['no_telepon']; ?></h3>
        <?php endforeach; ?>
    </div>
</section>
<!-- Akhir Jumbotron -->

<div class="page-breadcrumb">
    <div class="col-12 d-flex no-block align-items-center">
        <div class="">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('pelanggan'); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Home
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<!-- Container -->
<div class="container-fluid pt-2">
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header fs-3">
                    Kategori
                </div>

                <ul class="list-group list-group-flush fs-4">
                    <?php foreach ($kategori as $k) : ?>
                        <li class="list-group-item">
                            <form action="<?= base_url('pelanggan'); ?>" method="POST">
                                <input type="hidden" name="kategori" value="<?= $k['id_kategori']; ?>" readonly>
                                <button class="btn btn-outline-primary"><?= $k['nama_kategori']; ?></button>
                            </form>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row el-element-overlay">
                <?php if (empty($produk)) : ?>
                    <div class="alert alert-info" role="alert">
                        Hasil Pencarian Tidak Ada
                    </div>
                <?php else : ?>
                    <?php $i = 1;
                    foreach ($produk as $p) : ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="card-body shadow p-1">
                                <div class="card">
                                    <div class="el-card-item pb-0">
                                        <div class="el-card-avatar el-overlay-1">
                                            <img src="<?= base_url('assets/'); ?>images/upload/produk/<?= $p['foto']; ?>" alt="foto" class="card-img-top" />
                                            <div class="el-overlay">
                                                <ul class="list-style-none el-info">
                                                    <li class="el-item">
                                                        <a class="btn default btn-outline image-popup-vertical-fit el-link" href="<?= base_url('assets/'); ?>images/upload/produk/<?= $p['foto']; ?>"><i class="mdi mdi-magnify-plus"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div>
                                            <h3 class="mb-2 text-dark"><?= $p['nama_produk']; ?></h3>
                                            <h5 class="text-dark"><?= rupiah($p['harga']); ?></h5>
                                            <?php if ($p['stok'] == 0) : ?>
                                                <h5 class="text-danger">Stok : <?= $p['stok']; ?></h5>
                                            <?php else : ?>
                                                <h5 class="text-dark">Stok : <?= $p['stok']; ?></h5>
                                            <?php endif; ?>
                                        </div>
                                        <div class="m-0">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <a href="<?= base_url('pelanggan/detailproduk/') ?><?= $p['id_produk'] ?>" class="btn btn-info">Info</a>
                                                    </td>
                                                    <td>
                                                        <?php if ($p['stok'] == 0) : ?>
                                                        <?php else : ?>
                                                            <button type="button" class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#beli<?= $p['id_produk'] ?>">
                                                                Beli
                                                            </button>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal update -->
                        <div class="modal fade" id="beli<?= $p['id_produk'] ?>" tabindex="-1" aria-labelledby="beli" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Jumlah</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <?php echo form_open('pelanggan/beli/'); ?>
                                    <input type="hidden" name="id_produk" value="<?= $p['id_produk'] ?>" readonly>
                                    <input type="hidden" name="stok" value="<?= $p['stok'] ?>" readonly>
                                    <div class="modal-body">
                                        <label for="jumlah" class="col-sm col-form-label">Stok : <?= $p['stok']; ?></label>
                                        <div class="col-sm">
                                            <input type="number" class="form-control" id="jumlah" name="jumlah" min="1" max="<?= $p['stok']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="tambah" class="btn btn-primary">Beli</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end modal update -->
                    <?php $i++;
                    endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Container -->