<?php
require_once '../../config/db.php';
require '../../vendor/autoload.php'; // Ganti dengan path ke direktori pustaka

use Picqer\Barcode\BarcodeGeneratorHTML;

$barimage = time() . ".png";

$generator = new BarcodeGeneratorHTML();

$bartext = random_bytes(11);

$barcodeimages = $generator->getBarcode($bartext, $generator::TYPE_CODE_128);

if (isset($_POST['submit'])) {
    // var_dump($_FILES); die;
    session_start();

    // user tidak bisa langsung mengakses form admin
    if (!isset($_SESSION['id_user'])) {
        header('Location:../index.php');
        exit; // Pastikan untuk keluar dari skrip
    }

    $nama_barang = $conn->real_escape_string($_POST['nama_barang']);
    $jenis = $conn->real_escape_string($_POST['jenis']);
    $kondisi = $conn->real_escape_string($_POST['kondisi']);
    
    // Proses upload gambar


    $allowed_extensions	= array('png','jpg','jpeg');
    $file_name = $_FILES['file']['name'];
    $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $file_size	= $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $image = md5(uniqid($file_name . time(), true)) . '.' . $file_extension;
    // var_dump($image); die;
    
    if (!in_array($file_extension, $allowed_extensions)) {
        $_SESSION['pesan'] = '<div class="alert alert-danger" role="alert">Ekstensi gambar tidak valid.</div>';
        header('Location:../data-barang.php');
        exit;
    }

    if ($file_size > 2097152) { // Batas ukuran file dalam byte (2MB)
        $_SESSION['pesan'] = '<div class="alert alert-danger" role="alert">Ukuran gambar terlalu besar.</div>';
        header('Location:../data-barang.php');
        exit;
    }

    if (move_uploaded_file($file_tmp, '../../img_barang/'. $image)) {
        $tgl_regis = date('Y-m-d H:i:s'); //tanggal sekarang
        $petugas = $_SESSION['id_user']; //petugas yang login

        $randomint = random_int(000000000,999999999);
        $q = "INSERT INTO barang VALUES ('$randomint', '$petugas','$jenis','$image','$kondisi','$nama_barang', '$barimage','$tgl_regis')";
        $query = $conn->query($q);

        if ($query) {
            $_SESSION['pesan'] = '<div class="alert alert-success" role="alert">Data Barang berhasil ditambahkan!</div>';
        } else {
            $_SESSION['pesan'] = '<div class="alert alert-danger" role="alert">Data Barang gagal ditambahkan!</div>';
        }
    } else {
        $_SESSION['pesan'] = '<div class="alert alert-danger" role="alert">Gagal mengupload gambar.</div>';
    }

    header('Location:../data-barang.php');
    exit; // Pastikan untuk keluar dari skrip
}
?>
