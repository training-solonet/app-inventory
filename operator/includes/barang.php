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
        <!-- <button type="button" class="btn btn-primary btn-sm float-right" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Data
        </button>
        <br> -->
        <!-- <div class="clearfix"></div> -->
        <br>
    <div class="card-body">
    <table id="table" class="table table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Barang</th>
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
                <td>
                    <img src="../../img_barang/<?= $barang['image']; ?>" width="70" height="90" alt="Gambar Barang">
                </td>
                <!-- <td>< ?= $barang['image']; ?></td> -->
                <td><?= $barang['kondisi']; ?></td>
                <td><?= $barang['jenis']; ?></td>
                <td><?= $barang['tgl_regis']; ?></td>
                <td><?= $barang['nama']; ?></td>
                <td>
                    <div class="d-inline">
                        <a href="?p=detail-barang&id=<?= $barang['id_barang']; ?>" class="btn btn-primary btn-sm">Detail</a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
</div>


<!-- Modal
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
                <input type="text" name="jenis" placeholder="Contoh: Besi" class="form-control" required>
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
</div> -->
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>