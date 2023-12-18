<?php
// INSERT INTO input (nama, id_barang) VALUES ('$nama', '$id_brg')
$conn = mysqli_connect("localhost", "root", "", "app_inventaris");

$id_barang = $_POST['id_barang'];

    $cek = mysqli_query($conn, "SELECT COUNT(*) as count FROM barang WHERE id_barang = '$id_barang'");
    $cek_row = mysqli_fetch_assoc($cek);
    if ($cek_row['count'] > 0) {
        // validasi apakah barang masih dipinjam atau sudah kembali
        $cek_pinjam = mysqli_query($conn, "SELECT COUNT(*) as count FROM detail_pinjam WHERE id_barang = '$id_barang' AND tgl_kembali IS NULL");
        $validasi_pinjam = mysqli_fetch_assoc($cek_pinjam);
        if ($validasi_pinjam['count'] > 0){
            echo 'dipinjam';
        }else{

            // ketika barang ada
            $nama_query = mysqli_query($conn, "SELECT nama_barang FROM barang WHERE id_barang = '$id_barang'");
            $nama_row = mysqli_fetch_assoc($nama_query);
            $nama = $nama_row['nama_barang'];

            // cek ditable input akah sudah ada barang tersebut
            $cek_barang = mysqli_query($conn, "SELECT COUNT(*) as count FROM input WHERE id_barang = '$id_barang'");
            $cek_dulu = mysqli_fetch_assoc($cek_barang);
            if ($cek_dulu['count'] > 0){
                //ketika barang sudah ada
                // kalau sudah ada, validasi barang sudah di scan
                echo 'sudah ada';
            }else{
                // masukan ke table input
                mysqli_query($conn, "INSERT INTO input (nama, id_barang) VALUES ('$nama', '$id_barang')");
                echo 'valid';
            }

        }
    } else {
        // id_barang tidak valid
        echo 'tidak_valid';
    }
?>