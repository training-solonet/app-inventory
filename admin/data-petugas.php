<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['id_user'])) {
    header('Location:../index.php');
}

// select semua data petugas
// join tabel petugas dengan tabel user
$sql = "SELECT * FROM  users WHERE id_level = 2";
$query = $conn->query($sql);
$petugas= $query->fetch_all(MYSQLI_ASSOC);

// no urut increment
$no = 1;

require_once 'include/header.php';

if(!isset($_GET['p'])) {
    require_once 'include/petugas.php';
}elseif($_GET['p'] == 'edit-petugas') {
    require_once 'include/'.$_GET['p'].'.php'; //edit petugas.php
} elseif ($_GET['p'] == 'detail-petugas') {
    require_once 'include/'.$_GET['p'].'.php'; //detail petugas.php

} elseif($_GET['p'] == 'hapus-petugas') {

    $hapus = $conn->query("DELETE FROM petugas WHERE id_petugas = '$_GET[id]'");
    if ($hapus) {
        $_SESSION['pesan'] = '<div class="alert alert-warning" role="alert">Data petugas telah dihapus!!</div>';
        header('Location: data-petugas.php');
    }else {
        $_SESSION['pesan'] = '<div class="alert alert-danger" role="alert">Data petugas gagal dihapus!!</div>';
        header('Location: data-petugas.php');
    }
}


require_once 'include/footer.php';