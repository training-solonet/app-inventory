
<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['id_user'])) {
 header('Location: ../index.php');
}

// ambil data
$sql = "SELECT
peminjaman.*,
users.*,
(
SELECT
    COUNT(detail_pinjam.id_barang) AS total_barang
FROM
    detail_pinjam
WHERE
    peminjaman.id_peminjaman = detail_pinjam.id_peminjaman AND detail_pinjam.tgl_kembali IS NULL
) as total_barang
FROM
peminjaman
JOIN users ON peminjaman.id_user = users.id_user
JOIN detail_pinjam ON detail_pinjam.id_peminjaman = peminjaman.id_peminjaman
WHERE
EXISTS(
SELECT
    *
FROM
    detail_pinjam
WHERE
    peminjaman.id_peminjaman = detail_pinjam.id_peminjaman AND detail_pinjam.tgl_kembali IS NULL
)
GROUP BY
peminjaman.id_peminjaman;;";
$query = $conn->query($sql);
$data_peminjaman = $query->fetch_all(MYSQLI_ASSOC);

// var_dump($data_peminjaman['tgl_kembali']);

// Nomor untuk increment baris tabel
$no = 1;


require_once 'include/header.php';
require_once 'include/dtlpeminjaman.php';
require_once 'include/footer.php';
?>