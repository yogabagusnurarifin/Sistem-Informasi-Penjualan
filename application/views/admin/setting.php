<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form class="form-horizontal" action="<?= base_url('admin/simpanInformasi'); ?>" method="POST">
                    <div class="card-body">
                        <h4 class="card-title">Informasi</h4>
                        <?php if ($info == 0) : ?>
                            <div class="form-group row">
                                <label for="nama" class="col-sm-3 text-end control-label col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama" name="nama" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-sm-3 text-end control-label col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="alamat" id="" cols="44" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="provinsi" class="col-sm-3 text-end control-label col-form-label">Provinsi</label>
                                <div class="col-sm-9">
                                    <select name="provinsi" id="provinsi" class="select2 form-select shadow-none" style="width: 100%; height: 36px">
                                        <option>Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kota" class="col-sm-3 text-end control-label col-form-label">Kabupaten / Kota</label>
                                <div class="col-sm-9">
                                    <select name="kota" id="kota" class="select2 form-select shadow-none" style="width: 100%; height: 36px">
                                        <option>Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="no_telepon" class="col-sm-3 text-end control-label col-form-label">No Telepon</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="no_telepon" name="no_telepon" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 text-end control-label col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="email" name="email" />
                                </div>
                            </div>
                            <input type="hidden" name="input_provinsi" readonly>
                            <input type="hidden" name="input_kota" readonly>
                        <?php else : ?>
                            <input type="hidden" name="input_provinsi" readonly>
                            <input type="hidden" name="input_kota" readonly>
                            <div class="form-group row">
                                <label for="nama" class="col-sm-3 text-end control-label col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $informasi->nama; ?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-sm-3 text-end control-label col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="alamat" id="" cols="44" rows="3"><?= $informasi->alamat; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="provinsi" class="col-sm-3 text-end control-label col-form-label">Provinsi</label>
                                <div class="col-sm-9">
                                    <select name="provinsi" class="select2 form-select shadow-none" style="width: 100%; height: 36px">
                                        <option>Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kota" class="col-sm-3 text-end control-label col-form-label">Kabupaten / Kota</label>
                                <div class="col-sm-9">
                                    <select name="kota" class="select2 form-select shadow-none" style="width: 100%; height: 36px">
                                        <option>Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="no_telepon" class="col-sm-3 text-end control-label col-form-label">No Telepon</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="<?= $informasi->no_telepon; ?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 text-end control-label col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="email" name="email" value="<?= $informasi->email; ?>" />
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Cara Pemesanan</h4>
                            <!-- Create the editor container -->
                            <form action="<?= base_url('admin/simpanPemesanan'); ?>" method="POST">
                                <div>
                                    <?php if ($info == 0) : ?>
                                        <input type="hidden" name="cara_pemesanan">
                                    <?php else : ?>
                                        <input type="hidden" name="cara_pemesanan" value="<?= $informasi->cara_pemesanan; ?> ">
                                    <?php endif; ?>
                                    <div id="editor" style="min-height: 280px;">
                                        <?php if ($info == 0) : ?>
                                        <?php else : ?>
                                            <?= $informasi->cara_pemesanan; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" name="submit" class="btn btn-primary">
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <form class="form-horizontal" action="<?= base_url('login/ubahpassword'); ?>" method="POST">
                    <div class="card-body">
                        <h4 class="card-title">Ubah Password</h4>
                        <div class="form-group row">
                            <label for="password_lama" class="col-sm-3 text-end control-label col-form-label">Password Lama</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password_lama" name="password_lama" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password_baru" class="col-sm-3 text-end control-label col-form-label">Password Baru</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password_baru" name="password_baru" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password_baru2" class="col-sm-3 text-end control-label col-form-label">Ulangi Password Baru</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password_baru2" name="password_baru2" />
                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/'); ?>libs/jquery/dist/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $.ajax({
            type: 'post',
            url: "<?= base_url('admin/provinsi'); ?>",
            success: function(hasil_provinsi) {
                // console.log(hasil_provinsi);
                $("select[name=provinsi]").html(hasil_provinsi);
            }
        });

        $("select[name=provinsi]").on("change", function() {
            // Ambil id_provinsi ynag dipilih (dari atribut pribadi)
            var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
            $.ajax({
                type: 'post',
                url: "<?= base_url('admin/kota'); ?>",
                data: 'id_provinsi=' + id_provinsi_terpilih,
                success: function(hasil_kota) {
                    $("select[name=kota]").html(hasil_kota);
                }
            })
        });

        $("select[name=kota]").on("change", function() {
            var prov = $("option:selected", this).attr('id_provinsi');
            var dist = $("option:selected", this).attr('id_kota');

            $("input[name=input_provinsi]").val(prov);
            $("input[name=input_kota]").val(dist);
        });

    });
</script>