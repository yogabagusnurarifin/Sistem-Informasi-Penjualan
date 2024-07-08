<script src="<?= base_url('assets/'); ?>libs/jquery/dist/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $.ajax({
            type: 'post',
            url: "<?= base_url('ongkir/provinsi'); ?>",
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
                url: "<?= base_url('ongkir/kota'); ?>",
                data: 'id_provinsi=' + id_provinsi_terpilih,
                success: function(hasil_kota) {
                    $("select[name=kota]").html(hasil_kota);
                }
            })
        });

        $.ajax({
            type: 'post',
            url: "<?= base_url('ongkir/ekspedisi') ?>",
            success: function(hasil_ekspedisi) {
                $("select[name=ekspedisi]").html(hasil_ekspedisi);
            }
        });

        $("select[name=ekspedisi]").on("change", function() {
            // Mendapatkan data ongkos kirim

            // Mendapatkan ekspedisi yang dipilih
            var ekspedisi_terpilih = $("select[name=ekspedisi]").val();
            // Mendapatkan id_kota yang dipilih
            var kota_terpilih = $("option:selected", "select[name=kota]").attr("id_kota");
            // Mendapatkan toatal berat dari inputan
            $total_berat = $("input[name=total_berat]").val();
            $.ajax({
                type: 'post',
                url: "<?= base_url('ongkir/paket') ?>",
                data: 'ekspedisi=' + ekspedisi_terpilih + '&kota=' + kota_terpilih + '&berat=' + $total_berat,
                success: function(hasil_paket) {
                    // console.log(hasil_paket);
                    $("select[name=paket]").html(hasil_paket);

                    // Meletakkan nama ekspedisi terpilih di input ekspedisi
                    $("input[name=input_ekspedisi]").val(ekspedisi_terpilih);
                }
            })
        });

        $("select[name=kota]").on("change", function() {
            var prov = $("option:selected", this).attr('provinsi');
            var dist = $("option:selected", this).attr('kota');
            var tipe = $("option:selected", this).attr('kabupaten_kota');
            var kodepos = $("option:selected", this).attr('kodepos');

            $("input[name=input_provinsi]").val(prov);
            $("input[name=input_kota]").val(dist);
            $("input[name=input_tipe]").val(tipe);
            $("input[name=input_kodepos]").val(kodepos);
        });

        $("select[name=paket]").on("change", function() {
            var paket = $("option:selected", this).attr("paket");
            var ongkir = $("option:selected", this).attr("ongkir");
            var etd = $("option:selected", this).attr("etd");
            // var ongkir = 0.1 * ongkos;

            $("input[name=input_paket]").val(paket);
            $("input[name=input_ongkir]").val(ongkir);
            $("input[name=input_estimasi]").val(etd);

            var kode_unik = $("input[name=kode_unik]").val();
            var total_harga = $("input[name=total_harga]").val();
            var total_bayar = parseInt(total_harga) + parseInt(ongkir);
            $("input[name=total_bayar]").val(parseInt(total_bayar) + parseInt(kode_unik));

            // $("#ongkir_tampil").text("Rp. " + ongkir);
            // $("#total_tampil").text("Rp. " + total_bayar);

            const formatter = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            });
            // console.log(formatter.format(ongkir));
            // console.log(formatter.format(total_bayar));

            $("#ongkir_tampil").text(formatter.format(ongkir));
            $("#total_tampil").text(formatter.format(parseInt(total_bayar) + parseInt(kode_unik)));
        })

    });
</script>