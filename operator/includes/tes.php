<?php
$conn = mysqli_connect("localhost", "root", "", "app_inventaris");

if (isset($_POST['proses'])) {
    // var_dump($_POST);
    $id_user = $_POST['id_user'];
    $tgl_peminjaman = $_POST['tgl-peminjaman'];
    $peminjam = $_POST['peminjam'];
    $tgl = date('Y-m-d');

    $selectin = mysqli_query($conn, "SELECT * FROM input");
    $id_brg = array(); // Membuat array kosong untuk menyimpan data

    while ($row = mysqli_fetch_assoc($selectin)) {
        $id_brg[] = $row['id_barang']; // Menambahkan data ke dalam array
    }
    
    if ($id_brg != NULL) {
        $insetpin = mysqli_query($conn, "INSERT INTO peminjaman (id_user, tgl_pinjam, peminjam)
        VALUES ('$id_user', '$tgl', '$peminjam')");

        if ($insetpin) {
            $select = mysqli_query($conn, "SELECT * FROM peminjaman ORDER BY id_peminjaman DESC LIMIT 1");
            if (mysqli_num_rows($select) > 0) {
                // Data terakhir ditemukan
                $row = mysqli_fetch_assoc($select);
                $id_pin = $row["id_peminjaman"];
                
                if ($id_pin != NULL) {
                    foreach ($id_brg as $brg) {
                    $final = mysqli_query($conn, "INSERT INTO detail_pinjam(id_barang, id_peminjaman) 
                    VALUES ('$brg', '$id_pin')");
                    }
                    mysqli_query($conn, "DELETE FROM input");
                    header("Location: index.php");
                }
        }
    }

}
}
?>