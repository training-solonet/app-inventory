<div class="container mt-5">

        <h2>Ubah Data Petugas</h2>
    </br>

    <!-- button tombol kembali -->
        <a href="data-petugas.php" class="btn btn-secondary btn-sm float-left">&larr; Kembali</a>
        <div class="clearfix"></div>

    <?php
        // ambil data barang sesuai id barang yg akan diubah
        $barang = $conn->query("SELECT * FROM users WHERE id_user = '$_GET[id]'");
        $data = $barang->fetch_assoc();

        $data['id_level'] == 1 ? $sebagai = 'Admin' : $sebagai ='petugas';
    ?>

    <form method="POST" action='proses/proses-ubah-petugas.php' autocomplete="off" class="mt-3">
        <input type="hidden" value="<?= $data['id_user'] ?>" name="id">
        <div class="form-group">
            <label>Nama Petugas</label>
            <input type="text" name="nama" value="<?= $data['nama'] ?>" class="form-control" autofocus required>
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" value="<?= $data['username'] ?>" class="form-control" autofocus required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="text" name="password" value="<?= $data['password'] ?>" class="form-control" autofocus required>
        </div>
        <div class="form-group">
            <label>Sebagai</label>
            <input type="text" name="sebagai" value="<?= $sebagai ?>" class="form-control" autofocus readonly required>
</div>

        <button type="submit" name="submit" class="btn btn-success float-right">Simpan Perubahan</button>
    </form>
</div>
