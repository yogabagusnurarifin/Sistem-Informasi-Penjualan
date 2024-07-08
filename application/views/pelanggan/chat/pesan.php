<!-- Jumbotron -->
<section class="jumbotron text-center">
    <div class="container pb-3">
        <h1 class="display-5">Pesan / Chat</h1>
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
                        Pesan / Chat
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
                    <h4 class="card-title">Pesan</h4>
                    <div class="chat-box scrollable" id="chatBox" style="height: 250px">
                        <?php if (!empty($isiPesan)) : ?>
                            <?php foreach ($isiPesan as $ip) : ?>
                                <ul class="chat-list">
                                    <?php if ($ip['dari'] == $this->session->userdata('idPelanggan')) : ?>
                                        <!--chat Row -->
                                        <li class="odd chat-item">
                                            <div class="chat-content">
                                                <div class="box bg-light-inverse">
                                                    <?= $ip['pesan']; ?>
                                                </div>
                                                <br />
                                            </div>
                                            <div class="chat-time">
                                                <?= date('d-m-Y H:m', strtotime($ip['tanggal'])); ?>
                                            </div>
                                        </li>
                                    <?php else : ?>
                                        <!--chat Row -->
                                        <li class="chat-item">
                                            <!-- <div class="chat-img">
                                    <img src="<?= base_url('assets/'); ?>images/users/1.jpg" alt="user" />
                                </div> -->
                                            <div class="chat-content">
                                                <h6 class="font-medium">Admin</h6>
                                                <div class="box bg-light-info">
                                                    <?= $ip['pesan']; ?>
                                                </div>
                                            </div>
                                            <div class="chat-time">
                                                <?= date('d-m-Y H:m', strtotime($ip['tanggal'])); ?>
                                            </div>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <!-- <div class="alert alert-info text-center" role="alert">
                                Belum Ada Pesan
                            </div> -->
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card-body border-top">
                    <div class="input-group mb-3">
                        <textarea cols="3" id="pesan" class="form-control border-0" style="resize: none;" placeholder="Type and enter"></textarea>
                        <button class="btn btn-lg btn-cyan text-white" id="sendBtn">
                            <i class="mdi mdi-send fs-3"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Container -->
<?php $idAdmin = 1; ?>
<script src="<?= base_url('assets/'); ?>libs/jquery/dist/jquery.min.js"></script>
<script>
    var scrollDown = function() {
        let chatBox = document.getElementById('chatBox');
        chatBox.scrollTop = chatBox.scrollHeight;
    }

    scrollDown();

    $(document).ready(function() {

        $("#sendBtn").on('click', function() {
            pesan = $("#pesan").val();
            if (pesan == "") return;

            $.post("<?= base_url('pelanggan/insertchat') ?>", {
                    pesan: pesan,
                    dari: "<?= $_SESSION['idPelanggan']; ?>",
                    untuk: "<?= $idAdmin; ?>",
                },
                function(data, status) {
                    $("#pesan").val("");
                    $("#chatBox").append(data);
                    scrollDown();
                });

        });
    });
</script>