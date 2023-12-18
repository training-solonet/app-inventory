<?php
$conn = mysqli_connect("localhost", "root", "", "app_inventaris");

if (isset($_GET['id'])) {
    // var_dump($_GET);
    $id_peminjaman = $_GET['id'];
    $id_detail = $_GET['id_detail'];
    $tanggal = date('Y-m-d');
    // var_dump($tanggal);
    // Ambil data POST yang dikirimkan
    $query = mysqli_query($conn, "UPDATE detail_pinjam
    SET tgl_kembali = now()
    WHERE id_detail = $id_detail;
    ");
    if ($query) {
        // Jika query berhasil, arahkan kembali ke table-data.php
        header("Location: detail-pinjam.php?id=" . $id_peminjaman);

        exit; // Pastikan untuk mengakhiri eksekusi script setelah melakukan redirect
    } else {
        // Jika query gagal, Anda dapat menangani error di sini
        echo "Error: " . mysqli_error($conn);
    }
}
?>