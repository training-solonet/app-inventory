<?php
require_once '../../config/db.php';
require '../../vendor/autoload.php'; // Ganti dengan path ke direktori pustaka

use Picqer\Barcode\BarcodeGeneratorHTML;

$generator = new BarcodeGeneratorHTML();

if (isset($_POST['submit'])) {
    $conn = new mysqli('localhost', 'root', '', 'app_inventaris'); // Ganti dengan konfigurasi koneksi database

    if ($conn->connect_error) {
        die("Koneksi database gagal: " . $conn->connect_error);
    }

    $bartext = $_POST['bartext'];
    $barcodeImage = $generator->getBarcode($bartext, $generator::TYPE_CODE_128);

    $barcode = time() . ".png"; // Nama file gambar barcode


    $query = "INSERT INTO barang VALUES ('$randomint', '$petugas','$jenis','$ket','$kondisi','$nama_barang', '$bartext','$image','$tgl_regis')";

    if ($conn->query($query) === TRUE) {
        echo '<script>alert("Data Berhasil Disimpan");</script>';
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    $conn->close();
}
?>