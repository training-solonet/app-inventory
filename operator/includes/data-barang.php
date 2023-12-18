<?php
session_start();
require_once '../../config/db.php';

if (!isset($_SESSION['id_user'])) {
 header('Location: ../index.php');
}
// select semua data barang
// join tabel barang dengan tabel user
$sql = "SELECT * FROM barang LEFT JOIN users ON barang.id_user = users.id_user";
$query = $conn->query($sql);
$data_barang = $query->fetch_all(MYSQLI_ASSOC);

// no urut increment
$no = 1;

require_once 'header.php';

if(!isset($_GET['p'])) {
    require_once 'barang.php';

} elseif ($_GET['p'] == 'detail-barang') {
    require_once $_GET['p'].'.php'; //detail.barang.php

}


// require_once 'includes/detail-peminjaman.php';
require_once 'footer.php';