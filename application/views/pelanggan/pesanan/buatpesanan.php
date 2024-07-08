<!-- Jumbotron -->
<section class="jumbotron text-center">
    <div class="container pb-3">
        <h1 class="display-5">Buat Pesanan</h1>
    </div>
</section>
<!-- Akhir Jumbotron -->

<div class="page-breadcrumb">
    <div class="col-12 d-flex no-block align-items-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('pelanggan'); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Buat Pesanan
                </li>
            </ol>
        </nav>
    </div>
</div>

<!-- Container -->
<div class="container-fluid pt-2">
    <form class="form-horizontal" action="<?= base_url('pelanggan/inputtransaksi') ?>" method="POST">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <input type="hidden" name="id_transaksi" value="<?= $idTransaksi; ?>" readonly>
                            <label for="nama" class="col-sm-3 control-label col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama" name="nama" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-3 control-label col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="alamat" id="" cols="44" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="provinsi" class="col-sm-3 control-label col-form-label">Provinsi</label>
                            <div class="col-sm-9">
                                <select name="provinsi" id="provinsi" class="select2 form-select shadow-none" style="width: 100%; height: 36px" required>
                                    <option>Pilih Provinsi</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kota" class="col-sm-3 control-label col-form-label">Kabupaten / Kota</label>
                            <div class="col-sm-9">
                                <select name="kota" id="kota" class="select2 form-select shadow-none" style="width: 100%; height: 36px" required>
                                    <!-- <option>Pilih Kabupaten / Kota</option> -->
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ekspedisi" class="col-sm-3 control-label col-form-label">Ekspedisi</label>
                            <div class="col-sm-9">
                                <select name="ekspedisi" id="ekspedisi" class="select2 form-select shadow-none" style="width: 100%; height: 36px" required>
                                    <!-- <option>Pilih Ekspedisi</option> -->
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="paket" class="col-sm-3 control-label col-form-label">Paket</label>
                            <div class="col-sm-9">
                                <select name="paket" id="paket" class="select2 form-select shadow-none" style="width: 100%; height: 36px" required>
                                    <!-- <option>Pilih Paket</option> -->
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Produk</th>
                                        <th>Jumlah</th>
                                        <th>Berat (gr)</th>
                                        <th>Harga</th>
                                        <th>Total Berat</th>
                                        <th>Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $x = 1;
                                    foreach ($keranjang as $k) : ?>
                                        <?php
                                        $total = $k['jumlah'] * $k['harga'];
                                        $total_berat = $k['jumlah'] * $k['berat']; ?>
                                        <tr>
                                            <td><?= $x; ?></td>
                                            <td><?= $k['nama_produk']; ?></td>
                                            <td><?= $k['jumlah']; ?></td>
                                            <td><?= number_format($k['berat']); ?> gr</td>
                                            <td><?= rupiah($k['harga']); ?></td>
                                            <td><?= number_format($total_berat); ?> gr</td>
                                            <td><?= rupiah($k['total_harga']); ?></td>
                                        </tr>
                                    <?php $x++;
                                    endforeach; ?>
                                <tfoot>
                                    <?php
                                    $ongkir = 100000;
                                    $sum = 0;
                                    $sumberat = 0;
                                    foreach ($keranjang as $ks) {
                                        $sum += $ks['total_harga'];
                                        $sumberat += $ks['total_berat'];
                                    }
                                    $tot = $ongkir + $sum;
                                    ?>
                                    <tr class="fs-5">
                                        <td colspan="6">Sub Total</td>
                                        <td colspan="2"><?= rupiah($sum); ?></td>
                                    </tr>
                                    <tr class="fs-5">
                                        <td colspan="6">Ongkir</td>
                                        <td colspan="2">
                                            <span id="ongkir_tampil"></span>
                                        </td>
                                    </tr>
                                    <tr class="fs-5">
                                        <td colspan="6">Kode Unik</td>
                                        <td colspan="2">
                                            <span>
                                                <?php
                                                $kode_unik = mt_rand(001, 999);
                                                echo $kode_unik;
                                                ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="fs-5">
                                        <th colspan="6">
                                            <h4>Total</h4>
                                        </th>
                                        <th colspan="2">
                                            <h4 id="total_tampil"></h4>
                                        </th>
                                    </tr>
                                </tfoot>
                                </tbody>
                            </table>

                            <!-- input transaksi-->
                            <input type="hidden" name="input_provinsi" readonly>
                            <input type="hidden" name="input_kota" readonly>
                            <input type="hidden" name="input_tipe" readonly>
                            <input type="hidden" name="input_kodepos" readonly>
                            <input type="hidden" name="input_ekspedisi" readonly>
                            <input type="hidden" name="input_paket" readonly>
                            <input type="hidden" name="input_estimasi" readonly>
                            <input type="hidden" name="input_ongkir" readonly>
                            <?php if ($sumberat > 30000) {
                                $berat = 30000;
                            } else {
                                $berat = $sumberat;
                            }
                            ?>
                            <input type="hidden" name="kode_unik" value="<?= $kode_unik; ?>" readonly>
                            <input type="hidden" name="total_berat" value="<?= $berat; ?>" readonly>
                            <input type="hidden" name="total_harga" value="<?= $sum; ?>" readonly>
                            <input type="hidden" name="total_bayar" readonly>

                            <a href="<?= base_url('pelanggan/keranjang') ?>" class="btn btn-secondary text-white">Batal</a>
                            <button type="submit" class="btn btn-success text-white">Buat Pesanan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- Akhir Container -->