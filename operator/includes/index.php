<?php
session_start();
require_once '../../config/db.php';

if (!isset($_SESSION['id_user'])) {
 header('Location: ../index.php');
}

// Mengelurkan seluruh data barang yang ada di Database
$sql = "SELECT * FROM barang";
$query = $conn->query($sql);
$data_barang  = $query->fetch_all(MYSQLI_ASSOC);

// Nomor untuk increment baris tabel
$no = 1;

require_once 'header.php';
require_once 'peminjaman.php';
require_once 'footer.php';