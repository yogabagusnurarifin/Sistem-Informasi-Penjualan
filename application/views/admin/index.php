<div class="row">
    <!-- Column -->
    <div class="col-md-6 col-lg-3 col-xlg-3">
        <div class="card card-hover">
            <div class="box bg-cyan text-center">
                <h1 class="font-light text-white">
                    <?php if (!empty($transaksi)) : ?>
                        <?= $transaksi ?>
                    <?php else : ?>
                        0
                    <?php endif; ?>
                </h1>
                <h6 class="text-white">Total Pesanan</h6>
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-3 col-xlg-3">
        <div class="card card-hover">
            <div class="box bg-success text-center">
                <h1 class="font-light text-white">
                    <?php if (!empty($trs)) : ?>
                        <?= $trs ?>
                    <?php else : ?>
                        0
                    <?php endif; ?>
                </h1>
                <h6 class="text-white">Total Pengiriman</h6>
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-3 col-xlg-3">
        <div class="card card-hover">
            <div class="box bg-warning text-center">
                <h1 class="font-light text-white">
                    <?php if (!empty($pelanggan)) : ?>
                        <?= $pelanggan ?>
                    <?php else : ?>
                        0
                    <?php endif; ?>
                </h1>
                <h6 class="text-white">Total Pelanggan</h6>
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-3 col-xlg-3">
        <div class="card card-hover">
            <div class="box bg-danger text-center">
                <h1 class="font-light text-white">
                    <?php
                    if (!empty($stok)) { ?>
                        <?php foreach ($stok as $s) { ?>
                            <?= $s->stok ?? 0; ?>
                        <?php } ?>
                    <?php } else { ?>
                        0
                    <?php } ?>
                </h1>
                <h6 class="text-white">Stok Produk</h6>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>