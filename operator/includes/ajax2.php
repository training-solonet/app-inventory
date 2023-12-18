<!-- < ?php
$koneksi = mysqli_connect("localhost", "root", "", "barang");

$barcode = $_GET['barcode'];

$query = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang='$barcode'");
$barang = mysqli_fetch_assoc($query);

$data = array(
    'nama_barang' => $barang['nama_barang']
);

echo json_encode($data);
?> -->
