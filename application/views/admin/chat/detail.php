<?php
foreach ($pelanggan as $p) {
}
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?= $p['nama_pelanggan']; ?></h4>
                <div class="chat-box scrollable" id="chatBox" style="height: 250px">
                    <?php if (!empty($isiPesan)) : ?>
                        <?php foreach ($isiPesan as $ip) : ?>
                            <ul class="chat-list">
                                <?php if ($ip['dari'] == $this->session->userdata('id_admin')) : ?>
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

            $.post("<?= base_url('chat/insertchat') ?>", {
                    pesan: pesan,
                    dari: "<?= $_SESSION['id_admin']; ?>",
                    untuk: "<?= $p['id_pelanggan']; ?>",
                },
                function(data, status) {
                    $("#pesan").val("");
                    $("#chatBox").append(data);
                    scrollDown();
                });
        });
    });
</script>