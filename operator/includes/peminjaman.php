<div class="container mt-5">
 <div class="card">
  <div class="card-header">
   Petugas : <?= $_SESSION['nama'] ?>
  </div>
  <div class="card-body">
   <div class="row">
    <div class="col-md-6">
     <!-- <form action="includes/tes.php" method="POST" class="mt-3" autocomplete="off"> -->
      <div class="form-group">
      <label for="inputPassword" class="sr-only">QR CODE</label>
      <input type="text" id="id_barang" name="id_barang" class="form-control" autocomplete="off" placeholder="Barcode" autofocus>
      </div>
      <div class="clearfix"></div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#id_barang').on('input', function () {
            var id_barang = $(this).val();

            var jumlah = document.getElementById('id_barang').value.length

            if (jumlah >= 9) {
                // Kirim data ke server untuk memeriksa apakah id_barang valid
                $.ajax({
                    method: "POST",
                    url: 'tbh.php', // Ganti 'cek_id_barang.php' dengan file PHP yang akan memeriksa id_barang
                    data: {
                        id_barang: id_barang
                    },
                    success: function (response) {
                        console.log(response);
                        // Berikan tindakan setelah id_barang valid
                        if (response === 'valid') {
                            // Lakukan INSERT data ke tabel transaksi di sini (gunakan AJAX jika perlu)
                            // console.log('Data berhasil disimpan ke tabel transaksi');
                            // Perbarui halaman web
                        }else if(response === 'sudah ada'){
                            Swal.fire(
                            'barang sudah ada!!',
                            'tidak bisa menambahkan barang yang sudah ada dikeranjang!!',
                            'info'
                            )
                        }else if(response === 'dipinjam'){
                            Swal.fire(
                            'barang sudah dipinjam!!',
                            'tidak bisa menambahkan barang yang sudah ada dikeranjang!!',
                            'info'
                            )
                        }else{
                            Swal.fire(
                            'barang tidak ditemukan',
                            'barang yang dicari tidak ditemukan',
                            'question'
                            )
                        }
                        document.getElementById('id_barang').value = '';
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.error('Error: ' + textStatus, errorThrown);
                    }
                });
            }
        });
    });
</script>
     </div>
    <div class="col-md-6">
     <h3>Data Peminjaman</h3>

    <?php
    // Query database untuk mengambil data
    $query = mysqli_query($conn, "SELECT input.nama, input.id_barang, barang.image FROM input JOIN barang ON input.id_barang=barang.id_barang");

    while ($row = mysqli_fetch_assoc($query)) {
        // Mengisi <td> dengan data dari database
        $nama_barang = $row['nama'];
        $image = $row['image'];
        $id_barang = $row['id_barang'];
    ?>
<table class="table table-bordered">
    <tr align="center">
        <th>Nama barang</th>
        <th>Gambar</th>
        <th>Aksi</th>
    </tr>

    <tr align="center">
        <td><?= $nama_barang ?></td>
        <td>
            <img src="../../img_barang/<?= $image; ?>" width="70" height="90" alt="Gambar Barang">
        </td>
        <td align="center">
            <a href="?hapus=<?= $id_barang ?>" onclick="return confirm('Anda yakin ingin menghapus?')">Hapus</a>
        </td>
    </tr>
    <!-- <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <script>
    var qrcode = new QRCode("qrcode", {
        text: "< ?= $id_barang ?>", // Ganti dengan data yang ingin Anda ubah menjadi QR code
        width: 128,
        height: 128
    });
</script> -->

    <?php
    }

    if (isset($_GET['hapus'])) {
        $id_barang = $_GET['hapus'];
    
        // Query DELETE
        $sql = "DELETE FROM input WHERE id_barang = $id_barang";
    
        if ($conn->query($sql) === TRUE) {
            echo "Data berhasil dihapus";
            // Setelah menghapus data, perbarui halaman
            echo '<script>window.location.href = "operator/index.php";</script>';
        } else {
            echo "Error: " . $conn->error;
        }
    }
    
    ?>
</table>
     
     <hr>

     <form method="post" action="tes.php">
      <input type="hidden" name="id_user" value="<?= $_SESSION['id_user']; ?>">
      <div class="row">
       <div class="col-md-6">
        <div class="form-group">
         <label for="tgl-peminjaman">Tgl. Peminjaman</label>
         <input class="form-control" value="<?php echo date('Y-m-d') ?>" type="date" name="tgl-peminjaman" id="tgl-peminjaman" required>
        </div>
       </div>
       <div class="col-md-6">
        <div class="form-group">
         <label for="peminjam">Peminjam</label>
         <input class="form-control" type="text" name="peminjam" id="peminjam" placeholder="Masukan Nama" required>
        </div>
       </div>
       <div class="clearfix"></div>
      </div>
      <?php
        $jdt = mysqli_query($conn, "SELECT COUNT(*) as count FROM input");
        $jumlah = mysqli_fetch_assoc($jdt);

        if ($jumlah['count'] > 0){
            $disabled = NULL;
        } else {
            $disabled = 'disabled';
        }
      ?>
      <button type="submit" class="btn btn-success btn-block" name="proses" <?= $disabled ?>>Proses</button>
     </form>

    </div>
   </div>
  </div>
 </div>
</div>

<!-- ... (bagian selanjutnya) ... -->
    