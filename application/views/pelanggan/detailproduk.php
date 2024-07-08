<!-- Jumbotron -->
<section class="text-center">
    <!-- <div class="container pb-3"> -->
    <!-- <h1 class="display-5">Furniture</h1>
        <p class="lead">Furniture adalah hal yang tidak bisa kita pisahkan dari interior sebuah bangunan. Selain memiliki fungsi yang sangat penting dalam hal penyimpanan, furniture juga mempengaruhi tampilan interior sebab mampu menguatkan desain yang digunakan di dalamnya.</p> -->
    </div>
</section>
<!-- Akhir Jumbotron -->

<div class="container">
    <!-- Container -->
    <?php foreach ($produk as $p) : ?>
        <div class="card">
            <div class="card-header">
                <h1 class="fs-1"><?= $p['nama_produk']; ?></h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 pl-0 pr-0 m-0 mb-3">
                        <img src="<?= base_url('assets/images/upload/produk/') ?><?= $p['foto']; ?>" alt="foto produk" class="img-fluid">
                    </div>
                    <div class="col-lg-6">
                        <table class="table fs-5">
                            <tr>
                                <td>Nama Produk</td>
                                <td>: <?= $p['nama_produk']; ?></td>
                            </tr>
                            <tr>
                                <td>Ketegori</td>
                                <td> : <?= $p['nama_kategori']; ?></>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td> : <?= rupiah($p['harga']); ?></td>
                            </tr>
                            <tr>
                                <td>Berat</td>
                                <td> : <?= $p['berat']; ?> gram</td>
                            </tr>
                            <tr>
                                <td>Stok</td>
                                <td> : <?= $p['stok']; ?></td>
                            </tr>
                        </table>
                        <form action="<?= base_url('pelanggan/beli') ?>" method="POST">
                            <input type="hidden" name="id_produk" value="<?= $p['id_produk']; ?>" readonly>
                            <input type="hidden" name="stok" value="<?= $p['stok'] ?>" readonly>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" placeholder="Jumlah" name="jumlah" min="1" max="<?= $p['stok']; ?>">
                                <button type="submit" class="input-group-text btn btn-primary">Beli</button>
                            </div>
                        </form>
                        <p>Deskripsi : <br><?= $p['keterangan']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<!-- Akhir Container -->