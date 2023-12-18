<?php

session_start();
// Membuat koneksi dengan database
require_once'../config/db.php';

// mencegah sql injection menggunakan fungsi mysql_real_escape_string()
$username = $conn->real_escape_string($_POST['username']);
$password = $conn->real_escape_string($_POST['password']);
$level = $_POST['level'];

// jika salah satu username, password, level tidak sesuai maka akan dibalikan ke index.php
if (empty($username) || empty($password) || empty($level)) {
    header('Location:../index.php');
}

// membuat variabel sql untuk mengecek dari tabel user
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND id_level = '$level'";
$query = $conn->query($sql);

// jika query num_rowsnya lebih dari 0 maka akan mengecek dan memunculkan pesan si a login sebagai apa
if ($query->num_rows > 0) {
      // session akan digunakan ketika dihalaman login untuk menentukan si a itu admin atau operator
    while ($result = $query->fetch_assoc()) {
        $_SESSION['nama'] = $result['nama'];
        $_SESSION['id_user'] = $result['id_user'];
// jika id level menampilkan level 1 akan menampilkan pesan kalo si a admin jadi diarahkan kehalaman admin
        if($result['id_level'] == 1) {
            // alihkan ke halaman admin
           header('Location:../admin/index.php');
           echo "<script>alert('Anda masuk sebagai Admin');</script>";
        } else {
            header('Location:../operator/includes/index.php');
            echo "<script>alert('Anda masuk sebagai operator'); </script>";
        }
    }
} else {
    $_SESSION['error'] = '<b>Username</b> atau <b>password</b> tidak valid';
    header('Location:../index.php');
}
