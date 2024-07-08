 <!-- Jumbotron -->
 <div class="jumbotron text-center">
     <div class="container pb-1">
         <h1 class="display-5">Cara Pemesanan</h1>
     </div>
 </div>
 <!-- Akhir Jumbotron -->

 <div class="page-breadcrumb">
     <div class="col-12 d-flex no-block align-items-center">
         <div class="">
             <nav aria-label="breadcrumb">
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="<?= base_url('pelanggan/pelanggan'); ?>">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">
                         Cara Pemesanan
                     </li>
                 </ol>
             </nav>
         </div>
     </div>
 </div>

 <!-- Container -->
 <div class="container pt-2">
     <div class="card">
         <div class="card-body fs-4">
             <?php foreach ($info as $i) : ?>
                 <?= $i['cara_pemesanan']; ?>
             <?php endforeach; ?>
             <!-- <ol>
                 <li>
                     Lakukan pendaftaran pada menu pendaftaran untuk dapat login kedalam menu pengguna
                 </li>
                 <li>Login dengan menggunakan username dan password sesuai dengan akun yang sudah terdaftar</li>
                 <li>Cari barang yang akan dibeli kemudian klik beli, maka data barang akan masuk kedalam keranjang belanaja</li>
                 <li>Jika barang yang akan dibeli selesai maka klik tombol pesan</li>
                 <li>Lakukan pembayaran melalui tranfer</li>
                 <li>Kemudian konfirmasi pembayaran dengan mengupload bukti transfer</li>
                 <li>Kemudianakan dikonfirmasi kapan barang dikirim</li>
                 <li>Selesai</li>
             </ol> -->
         </div>
     </div>
 </div>
 <!-- Akhir Container -->