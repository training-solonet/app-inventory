<?php
session_start();
require_once '../../config/db.php';

if (!isset($_SESSION['id_user'])) {
 header('Location: ../index.php');
}
$id_pinjam = $_GET['id'];
// ambil data
$query = mysqli_query($conn, "SELECT *
                    FROM detail_pinjam
                    JOIN peminjaman ON peminjaman.id_peminjaman = detail_pinjam.id_peminjaman
                    JOIN barang ON detail_pinjam.id_barang = barang.id_barang 
                    WHERE detail_pinjam.id_peminjaman = '$id_pinjam'");
$data_peminjaman = $query->fetch_all(MYSQLI_ASSOC);
// var_dump($data_peminjaman);



// Nomor untuk increment baris tabel
$no = 1;


require_once '../includes/header.php';
require_once '../includes/tabel_detail.php';
require_once '../includes/footer.php';
?>