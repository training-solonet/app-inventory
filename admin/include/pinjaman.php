
<div class="container mt-5">
 
  <h2>Data Peminjaman</h2>
  <hr>

  <a href="index.php" class="btn btn-primary btn-sm float-left">← Kembali</a>
  <a href="?h=tambah-petugas" class="btn btn-primary btn-sm float-right">Tambah Petugas</a>
  <div class="clearfix"></div>

  <table class="table table-sm mt-3">
    <thead>
      <tr>
          <th>No</th>
          <th>nama peminjam</th>
          <th>tanggal pinjam</th>
          <th>tanggal kembali</th>
      </tr>
    </thead>
    <tbody>
      <?php

          // Pastikan $data2 adalah array atau objek sebelum menggunakan foreach loop
          foreach ($pinjaman as $r):
            $r['id_level'] == 2 ? $sebagai = 'Operator' : $sebagai = 'Admin';
        ?>

      <tr>
            <td><?= $no++ ?></td>
            <td><?= $r['nama'] ?></td>
            <td><?= $r['username'] ?></td>
            <td><?= $r['password'] ?></td>
            <td><?= $sebagai ?></td>
        <td>
          <div class="d-inline">
              <a href="?p=edit-petugas&id=<?= $r['id_user'] ?>" class="btn btn-success btn-sm">Edit</a>
              <a href="?p=hapus-petugas&id=<?= $r['id_user'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
          </div>
      </td>
      </tr>
      
      <?php endforeach ?>
    </tbody>
  </table>

</div> 

<!-- < ?php
// Contoh data array untuk $data2
$data2 = array(
    array('id_level' => 2),
    array('id_level' => 1),
    // Tambahkan data lainnya sesuai kebutuhan
);

// Pastikan $data2 adalah array atau objek sebelum menggunakan foreach loop
if (is_array($data2) || is_object($data2)) {
    foreach ($data2 as $a) {
        // Periksa kondisi $a['id_level'] dan tetapkan nilai $sebagai
        $sebagai = ($a['id_level'] == 2) ? "Admin" : "Operator";
        // Gunakan nilai $sebagai sesuai kebutuhan
        echo "Sebagai: " . $sebagai . "<br>";
    }
} else {
    // Tindakan yang diambil jika $data2 bukan array atau objek (misalnya, lempar error atau pesan kesalahan)
    echo "Error: Data tidak valid!";
}
?>
<tr>
    <td>< ?= $no++ ?></td>
    <td>< ?= $a['nama'] ?></td>
    <td>< ?= $a['username'] ?></td>
    <td>< ?= $a['password'] ?></td>
    <td>< ?= $sebagai ?></td>
    <td>
        <div class="d-inline">
            <a href="?h=detail-petugas&id=< ?= $a['id_user'] ?>" class="btn btn-primary btn-sm">Detail</a>
            <a href="?h=edit-petugas&id=< ?= $a['id_user'] ?>" class="btn btn-success btn-sm">Edit</a>
            <a href="?h=hapus-petugas&id=< ?= $a['id_user'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
        </div>
    </td>
</tr>

< ?php endforeach ?>
} else {
    // Berikan pesan jika $data2 tidak berisi data yang valid
    echo "<tr><td colspan='6'>Tidak ada data petugas yang tersedia.</td></tr>";
}
?> -->
