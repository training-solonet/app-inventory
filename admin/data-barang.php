<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['id_user'])) {
    header('Location:../index.php');
}

// select semua data barang
// join tabel barang dengan tabel user
$sql = "SELECT * FROM barang LEFT JOIN users ON barang.id_user = users.id_user";
$query = $conn->query($sql);
$data_barang = $query->fetch_all(MYSQLI_ASSOC);

// no urut increment
$no = 1;

require_once 'include/header.php';

if(!isset($_GET['p'])) {
    require_once 'include/barang.php';
}elseif($_GET['p'] == 'edit-barang') {
    require_once 'include/'.$_GET['p'].'.php'; //edit-barang.php
} elseif ($_GET['p'] == 'detail-barang') {
    require_once 'include/'.$_GET['p'].'.php'; //detail.barang.php

} elseif($_GET['p'] == 'hapus-barang') {

    $hapus = $conn->query("DELETE FROM barang WHERE id_barang = '$_GET[id]'");
    if ($hapus) {
        $_SESSION['pesan'] = '<div class="alert alert-warning" role="alert">Data barang telah dihapus!!</div>';
        header('Location: data-barang.php');
    }else {
        $_SESSION['pesan'] = '<div class="alert alert-danger" role="alert">Data barang gagal dihapus!!</div>';
        header('Location: data-barang.php');
    }
}


require_once 'include/footer.php';