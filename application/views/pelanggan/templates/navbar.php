<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('pelanggan'); ?>">UD Sido Asih</a>
        <form action="<?= base_url('pelanggan/cariproduk'); ?>" method="POST" class="d-flex" role="search">
            <input class="form-control me-2" name="cari" type="search" placeholder="Cari" aria-label="Search">
            <button class="btn btn-outline-light" type="submit">Cari</button>
        </form>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <?php if ($this->session->userdata('loginPelanggan')) : ?>
                    <?php if (($title == 'Home') or ($title == 'Detail Produk')) : ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= base_url('pelanggan'); ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('pelanggan/keranjang'); ?>">Keranjang Belanja</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('pelanggan/datapesanan'); ?>">Data Pesanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('pelanggan/pesan'); ?>">Pesan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('auth/logout'); ?>" onclick="return confirm('Anda yakin mau Logout ?')">Logout</a>
                        </li>
                    <?php elseif (($title == 'Keranjang') or ($title == 'Buat Pesanan')) : ?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?= base_url('pelanggan'); ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= base_url('pelanggan/keranjang'); ?>">Keranjang Belanja</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('pelanggan/datapesanan'); ?>">Data Pesanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('pelanggan/pesan'); ?>">Pesan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('auth/logout'); ?>" onclick="return confirm('Anda yakin mau Logout ?')">Logout</a>
                        </li>
                    <?php elseif (($title == 'Data Pesanan') or ($title == 'Detail Pesanan')) : ?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?= base_url('pelanggan'); ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('pelanggan/keranjang'); ?>">Keranjang Belanja</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= base_url('pelanggan/datapesanan'); ?>">Data Pesanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('pelanggan/pesan'); ?>">Pesan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('auth/logout'); ?>" onclick="return confirm('Anda yakin mau Logout ?')">Logout</a>
                        </li>
                    <?php elseif ($title == 'Pesan') : ?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?= base_url('pelanggan'); ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('pelanggan/keranjang'); ?>">Keranjang Belanja</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('pelanggan/datapesanan'); ?>">Data Pesanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= base_url('pelanggan/pesan'); ?>">Pesan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('auth/logout'); ?>" onclick="return confirm('Anda yakin mau Logout ?')">Logout</a>
                        </li>
                    <?php endif; ?>
                <?php else : ?>
                    <?php if (($title == 'Home') or ($title == 'Detail Produk')) : ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= base_url('pelanggan'); ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('pelanggan/carapemesanan'); ?>">Cara Pemesanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('pelanggan/informasi'); ?>">Informasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('auth'); ?>">Login</a>
                        </li>
                    <?php elseif ($title == 'Cara Pemesanan') : ?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?= base_url('pelanggan'); ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= base_url('pelanggan/carapemesanan'); ?>">Cara Pemesanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('pelanggan/informasi'); ?>">Informasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('auth'); ?>">Login</a>
                        </li>
                    <?php elseif ($title == 'Informasi') : ?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?= base_url('pelanggan'); ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('pelanggan/carapemesanan'); ?>">Cara Pemesanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= base_url('pelanggan/informasi'); ?>">Informasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('auth'); ?>">Login</a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>


        </div>
    </div>
</nav>
<!-- Akhir Navbar -->