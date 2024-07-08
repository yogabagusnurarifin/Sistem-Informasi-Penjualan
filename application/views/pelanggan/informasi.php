<!-- Jumbotron -->
<section class="jumbotron text-center">
    <div class="container pb-3">
        <h1 class="display-5">Informasi</h1>
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
                        Informasi
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<!-- Container -->
<div class="container-fluid pt-2">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <?php foreach ($info as $i) : ?>
                        <h5 class="card-title">Telepon :</h5>
                        <p class="card-text"><?= $i['no_telepon']; ?></p>

                        <h5 class="card-title">Email :</h5>
                        <p class="card-text"><?= $i['email']; ?></p>

                        <h5 class="card-title">Alamat</h5>
                        <p class="card-text"><?= $i['alamat']; ?></p>

                        <h5 class="card-title">Social Media</h5>
                        <p class="card-text fs-2">
                            <a href="#" class="mdi mdi-twitter-box"></a>
                            <a href="#" class="mdi mdi-whatsapp text-success"></a>
                            <a href="#" class="mdi mdi-google-plus-box text-danger"></a>
                            <a href="#" class="mdi mdi-facebook-box"></a>
                            <a href="#" class="mdi mdi-instagram text-danger"></a>
                        </p>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15819.760350339111!2d111.5671347!3d-7.5815009!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79bf0291d80bf3%3A0x98c1f8166f1d7bdb!2sUD%20SIDO%20ASIH!5e0!3m2!1sen!2sid!4v1655194497318!5m2!1sen!2sid" width="800" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Container -->