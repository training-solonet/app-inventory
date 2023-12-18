<?php

$dt_pinjam = NULL;

if(isset($_POST['submit']) && isset($_SESSION['list_peminjaman'])) {
 foreach ($_SESSION['list_peminjaman'] as $list) {
  $explode = explode("-", $list['nama_barang']);
//   $barcode = trim($explode[0]);
//   $nama_barang = trim($explode[1]);

        if (isset($explode[0])) {
            $barcode = trim($explode[0]);
        } else {
            $barcode = '';
        }
        if (isset($explode[1])) {
            $nama_barang = trim($explode[1]);
        } else {
            $nama_barang = '';
        }
//   $jenis = trim($explode[2]);

  $barang = $conn->query("SELECT * FROM barang WHERE nama_barang='$nama_barang' ");
  $dt_barang = $barang->fetch_assoc();
  


//   $sisa = ($dt_barang['jumlah'] - $list['jumlah_pinjam']);

//   $update_dt_brg = $conn->query("UPDATE barang SET jumlah = '$sisa' WHERE id_barang = '$dt_barang[id_barang]'");

 }
}

if(isset($_POST['proses'])) {
        $tgl_peminjaman = $_POST['tgl-peminjaman']; 
        $tgl_pengembalian = date('Y-m-d');
        $peminjam = $_POST['peminjam'];
        $id_user = $_POST['id_user'];
      
        $peminjaman = $conn->query("INSERT INTO peminjaman VALUES ('', '$id_user', '$tgl_peminjaman', '$tgl_pengembalian')");

        $detail_pinjam = $conn->query("INSERT INTO detail_pinjam VALUES ('', '$list[id_barang]', '$list[nama_barang]', '$peminjam', (SELECT id_peminjaman FROM peminjaman ORDER BY id_peminjaman DESC LIMIT 1))");
      
        // $update_dt_brg = $conn->query("UPDATE barang SET jumlah = '$sisa' WHERE id_barang = '$dt_barang[id_barang]'");

   }
