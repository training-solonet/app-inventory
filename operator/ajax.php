<?php
// Membuat koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "app_inventaris");

// Variabel nama_barang yang dikirimkan dari JavaScript
$nama = $_POST['nama_barang'];

// Mengambil data
$query = mysqli_query($koneksi, "SELECT id_barang, nama_barang FROM barang WHERE nama_barang='$nama'");
$barang = mysqli_fetch_array($query);

// Data yang akan dikirimkan kembali dalam format JSON
$data = array(
    'nama_barang' => @$barang['nama_barang'],
    'id_barang' => @$barang['id_barang']
);

// Tampil data dalam format JSON
echo json_encode($data);
?>
