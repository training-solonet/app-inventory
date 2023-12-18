<?php

session_start();
require_once '../config/db.php';

// user tidak langsung bisa mengakses form admin
if (!isset($_SESSION['id_user'])) {
    header('Location:../index.php');
}

// tampilan dari halaman admin
require_once 'include/header.php';
require_once 'include/dashboard.php'; //content
require_once 'include/footer.php';