<div class="container mt-5">

    <h2>Ubah Data Barang</h2>
</br>

<!-- button tombol kembali -->
<a href="data-barang.php" class="btn btn-secondary btn-sm float-left">&larr; Kembali</a>
<div class="clearfix"></div>

<?php
// ambil data barang sesuai id barang yg akan diubah

if (isset($_GET['id'])) {
    $edit_id = $_GET['id']; // Assuming you have an identifier in the URL
    // var_dump($edit_id); die;
    // Retrieve data from the database based on $edit_id
    $query = "SELECT * FROM barang WHERE id_barang = '$edit_id'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Retrieve data from the fetched row
        $nama_barang = $row['nama_barang'];
        $jenis = $row['jenis'];
        $kondisi = $row['kondisi'];
        // ... other fields
    }
}
?>

<form action="proses/proses-ubah-barang.php" method="POST" class="mt-3" autocomplete="off">
    <input type="hidden" name="id" value="<?= $edit_id; ?>">
    <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" name="nama_barang" placeholder="<?php echo $nama_barang; ?>" class="form-control" autofocus required>
            </div>
            <div class="form-group">
                <label for="jenis">Jenis</label>
                <input type="text" name="jenis" placeholder="<?php echo $jenis; ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="kondisi">Kondisi Barang</label>
                <input type="text" name="kondisi" placeholder="<?php echo $kondisi; ?>" class="form-control" required>
           </div>
    <div class="row">
        <div class="col md-4">
            <button type="submit" name="simpan" class="btn btn-success">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</form>
</div>