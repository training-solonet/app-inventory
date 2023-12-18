<?php
// Atur zona waktu Asia yang diinginkan
date_default_timezone_set('Asia/Jakarta');
    if (isset($_SESSION['pesan'])) {
        echo $_SESSION['pesan'];
        unset($_SESSION['pesan']);
    }
?>

<div class="container-fluid">

    <h2>Data Barang</h2>
    <hr>

         <a href="index.php" class="btn btn-secondary float-left">&larr; Kembali</a>
    <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Data
        </button>
        <br>
        <!-- <div class="clearfix"></div> -->
        <div class="col align-self-center">
        <div class="card-body">
    <table id="table" class="table table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Barang</th>
                <th>Barcode</th>
                <th>Gambar</th>
                <th>Kondisi</th>
                <th>Jenis</th>
                <th>Tgl. Registrasi</th>
                <th>Petugas</th>
                <!--<th>Barcode</th>-->
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data_barang as $barang) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $barang['nama_barang']; ?></td>
                <td id="qrcode<?= $barang['id_barang'] ?>">
                    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
                    <script>
                        var qrcode<?= $barang['id_barang'] ?> = new QRCode("qrcode<?= $barang['id_barang'] ?>", {
                            text: "<?= $barang['id_barang'] ?>", // Ganti dengan data yang ingin Anda ubah menjadi QR code
                            width: 128,
                            height: 128
                        });
                    </script>
                <td>
                    <img src="../img_barang/<?= $barang['image']; ?>" width="70" height="90" alt="Gambar Barang">
                </td>
                <!-- <td>< ?= $barang['image']; ?></td> -->
                <td><?= $barang['kondisi']; ?></td>
                <td><?= $barang['jenis']; ?></td>
                <td><?= $barang['tgl_regis']; ?></td>
                <td><?= $barang['nama']; ?></td>
                <td>
                <div class="d-inline">
                        <a href="?p=detail-barang&id=<?= $barang['id_barang']; ?>" class="btn btn-primary btn-sm">Detail</a>
                        <a href="?p=edit-barang&id=<?= $barang['id_barang']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="?p=hapus-barang&id=<?= $barang['id_barang']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
    </div>
</div>


<!-- Modal Tambah Barang-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Barang</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="proses/proses-tambah-barang.php" method="POST" autocomplete="off" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" name="nama_barang" placeholder="Contoh: Tangga" class="form-control" autofocus required>
            </div>
            <div class="form-group">
                <label for="jenis">Jenis</label>
                <select name="jenis" class="form-select form-control" aria-label="Default select example" require>
                          <option selected>-- Jenis ---</option>
                          <option>Perkakas</option>
                          <option>Properti</option>

                      </select>
                <!-- <input type="text" name="jenis" placeholder="Contoh: Perkakas/Properti" class="form-control" required> -->
            </div>
            <div class="form-group">
                <label for="kondisi">Kondisi Barang</label>
                <input type="text" name="kondisi" placeholder="Contoh: Baik / Rusak" class="form-control" required>
           </div>
            <div class="form-group">
                <label for="file">Gambar</label>
                <input type="file" name="file" class="form-control" required>
            </div>
            
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
      </div>
  </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>
