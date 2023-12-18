<div class="container-fluid">

 <div class="row">
  <div class="col">
   <h2>Data Peminjaman</h2>
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
    <th>Peminjam</th>
    <!-- <th>Tgl. Pinjam</th>
    <th>Tgl. Kembali</th> -->
    <th>Petugas</th>
    <th>Total Barang</th>
    <th>Aksi</th>
   </tr>
  </thead>
  <tbody>

   <?php foreach ($data_peminjaman as $data) :
   ?>

   <tr>
    <td><?= $no++; ?></td>
    <td><?= $data['peminjam']; ?></td>
    <td><?= $data['nama']; ?></td>
    <td><?= $data['total_barang']; ?></td>
    <td>
        <div class="d-inline">
            <a href="detail-pinjam.php?id=<?= $data['id_peminjaman']; ?>" class="btn btn-primary btn-sm">Detail</a>
        </div>
    </td>
   </tr>

   <?php endforeach; ?>
   <!-- <div class="modal fade" id="konfirmasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pengembalian</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../includes/tes.php" method="POST">
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="form-label">ID Barang</label>
                        <input type="email" class="form-control" name="id_brg">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" name="konfirmasi">Simpan</button>
                       
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->

  </tbody>
 </table>
 </div>
</div>