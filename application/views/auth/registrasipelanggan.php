<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template" />
    <meta name="description" content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework" />
    <meta name="robots" content="noindex,nofollow" />
    <title>Halaman Login</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/'); ?>images/favicon.png" />
    <!-- Custom CSS -->
    <link href="<?= base_url('assets/'); ?>dist/css/style.min.css" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="bg-primary p-2 text-dark bg-opacity-10">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 mt-5">
                <div class="no-block bg-light align-items-center shadow-lg p-5 mb-5 bg-light rounded">
                    <div class="text-center pt-1 pb-3">
                        <h1>Registrasi</h1>
                    </div>
                    <div class="border-top border-dark"></div>
                    <!-- Form -->
                    <form class="form-horizontal mt-3" id="loginform" action="<?= base_url('auth/registrasipelanggan') ?>" method="POST">
                        <div class="row pb-4">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    </div>
                                    <input type="text" name="nama_pelanggan" class="form-control form-control-lg" placeholder="Nama Lengkap" required />
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    </div>
                                    <input type="text" name="alamat" class="form-control form-control-lg" placeholder="Alamat" required />
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    </div>
                                    <input type="text" name="no_telepon" class="form-control form-control-lg" placeholder="Nomor Telepon" required />
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    </div>
                                    <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" required />
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    </div>
                                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required />
                                </div>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <button type="submit" class="mt-3 btn btn-success float-end text-white mb-3">Daftar</button>
                            <!-- <a class="mt-3 btn btn-success float-end text-white mb-3" href="<?= base_url('auth'); ?>">Daftar</a> -->
                            <a class="text-center" href="<?= base_url('auth'); ?>">Login!</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- All Required js -->
        <!-- ============================================================== -->
        <script src="<?= base_url('assets/'); ?>libs/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="<?= base_url('assets/'); ?>libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>