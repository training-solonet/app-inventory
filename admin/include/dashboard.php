<div class="container mt-5">

<div class="row text-center">
    <div class="col-md-4">
        <div class="card" style="width: 18rem;">
            <div class="card-body">

            <?php
            $q = $conn->query("SELECT COUNT(*) AS jmlBarang FROM barang");
            $barang = $q->fetch_array();

            ?>

                <h5 class="card-tittle">Data Barang</h5>
                <p class="card-text">Jumlah Barang saat ini</p>
                <h4><?= $barang['jmlBarang']?></h4>
                <a href="data-barang.php" class="card-link">Lihat data barang</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card" style="width: 18rem;">
            <div class="card-body">

            <?php
            $q = $conn->query("SELECT COUNT(*) AS jmlUser FROM users WHERE id_level = 2");
            $user= $q->fetch_array();

            ?>

                <h5 class="card-tittle">Data User</h5>
                <p class="card-text">Jumlah petugas keseluruhan</p>
                <h4><?= $user['jmlUser'] ?></h4>
                <a href="data-petugas.php" class="card-link">Lihat data user</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card" style="width: 18rem;">
            <div class="card-body">

            <?php
            $q = $conn->query("SELECT COUNT(*) AS jmlPinjam FROM detail_pinjam");
            $pinjam = $q->fetch_array();

            ?>

                <h5 class="card-tittle">Data Peminjaman</h5>
                <p class="card-text">Data barang yang dipinjam</p>
                <h4><?= $pinjam['jmlPinjam'] ?></h4>
                <a href="data-peminjaman.php" class="card-link">Lihat data peminjaman</a>
            </div>
        </div>
    </div>
</div>

</div>