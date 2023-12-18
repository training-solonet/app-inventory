<div class="container">

<h2>Detail Barang</h2>
<hr>

<a href="data-barang.php" class="btn btn-secondary btn-sm">&larr; Kembali</a>
<div class="clearfix"></div>

    <?php
        $q = $conn->query("SELECT * FROM barang INNER JOIN users WHERE id_barang = '$_GET[id]'");
        $data = $q->fetch_assoc();

    ?>

        <div class="card mt-3">
            <div class="card-header">
                <b><?= $data['nama_barang'] ?></b>
            </div>
            <div class="card-body">
                <span id="qrcode"></span>
                    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
                    <script>
                        var qrcode = new QRCode("qrcode", {
                            text: "<?= $data['id_barang'] ?>", // Ganti dengan data yang ingin Anda ubah menjadi QR code
                            width: 128,
                            height: 128
                        });
                    </script>
                <p class="mt-2">Jenis Barang : <?= $data['jenis'] ?></p>
                <p>Kondisi : <?= $data['kondisi'] ?></p>
                <p>Tgl_registrasi : <?= $data['tgl_regis'] ?></p>
                <p>Petugas: <?= $data['nama'] ?></p>
            </div>
        </div>
</div>