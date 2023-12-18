<div class="container-fluid">

 <div class="row">
  <div class="col">
   <h2>Detail Peminjam</h2>
  </div>
  <!-- <div class="col">
   <a href="data-peminjaman.php?act=cetak" target="_blank"><button class="btn btn-primary float-right">Cetak</button></a>
  </div> -->
 </div> 

 <div class="clearfix"></div>
<div class="card-body">
 <table id="table" class="table table-bordered text-center" width="100%">
  <thead>
   <tr>
    <th>No</th>
    <th>Nama Barang</th>
    <th>Tanggal Pinjam</th>
    <!-- <th>Tgl. Pinjam</th>
    <th>Tgl. Kembali</th> -->
    <th>Tanggal Kembali</th>
   </tr>
  </thead>
  <tbody>

   <?php foreach ($data_peminjaman as $detail) :
   ?>

   <tr>
    <td><?= $no++; ?></td>
    <td><?= $detail['nama_barang']; ?></td>
    <td><?= date('d/m/Y', strtotime($detail['tgl_pinjam'])) ?></td>
    <?php
        if ($detail['tgl_kembali'] == NULL) {
            echo '<td><a href="pengembalian.php?id=' . $detail['id_peminjaman'] . '&id_detail=' . $detail['id_detail'] . '" class="btn btn-success btn-sm" onclick="return konfirmasi()">Konfirmasi</a></td>';
        } else {
            echo '<td>' . date('d/m/Y', strtotime($detail['tgl_kembali'])) . '</td>';
        }
        ?>

        <script>
        function konfirmasi() {
            return confirm("Sudah dipastikan kembali barang dengan sesuai?");
        }
        </script>

   </tr>

   <?php endforeach; ?>

  </tbody>
 </table>
 </div>
</div>