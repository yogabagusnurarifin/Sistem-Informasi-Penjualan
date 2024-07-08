<!-- Jumbotron -->
<section class="jumbotron text-center">
    <div class="container pb-3">
        <h1 class="display-5">Keranjang Belanja</h1>
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
                        Keranjang Belanja
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<!-- Container -->
<div class="container-fluid pt-2">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- <div class="border-top mb-3"></div> -->
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode Produk</th>
                                    <th>Produk</th>
                                    <th>Kategori</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Total Harga</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $x = 1;
                                foreach ($keranjang as $k) : ?>
                                    <?php $total = $k['jumlah'] * $k['harga']; ?>
                                    <tr>
                                        <td><?= $x; ?></td>
                                        <td><?= $k['id_produk']; ?></td>
                                        <td><?= $k['nama_produk']; ?></td>
                                        <td><?= $k['nama_kategori']; ?></td>
                                        <td><?= $k['jumlah']; ?></td>
                                        <td><?= rupiah($k['harga']); ?></td>
                                        <td><?= rupiah($total); ?></td>
                                        <td>
                                            <a href="<?= base_url('pelanggan/hapuskeranjang/') ?><?= $k['id_keranjang'] ?>" class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                <?php $x++;
                                endforeach; ?>
                            <tfoot>
                                <?php
                                $sum = 0;
                                foreach ($keranjang as $ks) {
                                    $sum += $ks['total_harga'];
                                }
                                ?>
                                <tr class="fs-4">
                                    <td colspan="6">Total</td>
                                    <td colspan="2"><?= rupiah($sum); ?></td>
                                </tr>
                            </tfoot>
                            </tbody>
                        </table>
                        <a href="<?= base_url('pelanggan'); ?>" class="btn btn-secondary">Pilih Produk</a>
                        <?php if (!empty($keranjang)) : ?>
                            <a href="<?= base_url('pelanggan/buatpesanan'); ?>" class="btn btn-success text-white">Buat Pesanan</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Container -->