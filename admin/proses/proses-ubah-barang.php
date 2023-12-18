<?php

session_start();
require_once '../../config/db.php';

if(!isset($_SESSION['id_user'])) {
    header('Location:../../index.php'); //halaman login
}

if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $nama_barang = $_POST['nama_barang'];
    $jenis = $_POST['jenis'];
    $kondisi = $_POST['kondisi'];
    // var_dump($id); die;
    // $gambar = $_POST['image'];   
    
    $update = $conn->query("UPDATE barang SET nama_barang ='$nama_barang',
                                              jenis = '$jenis',
                                              kondisi = '$kondisi'
                            WHERE id_barang = '$id'"); 
    
    if ($update) {
        header('Location:../data-barang.php');
    } else {
        header('Location:../data-barang?p=edit-barang&id='.$_POST['id']);
    }
}


// <div class="modal fade" id="modalupdate<?= $id_barang; ? >" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
// <div class="modal-dialog">
//     <div class="modal-content">
//         <div class="modal-header">
//             <h5 class="modal-title" id="exampleModalLabel">Edit Data Barang</h5>
//             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
//                 <span aria-hidden="true">&times;</span>
//             </button>
//         </div>
//         <form method="POST">
//             <div class="modal-body">
//                 <input type="text" name="id_barang" value="<?= $id_barang; ? >" class="form-control" required>
//                 <br />
//                 <input type="text" name="nama_barang" value="<?= $nama_barang; ? >" class="form-control" required>
//                 <br />
//                 <input type="number" name="harga" value="<?= $harga; ? >" class="form-control" required>
//                 <br>
//                 <input type="number" name="stok" value="<?= $stok; ? >" class="form-control" required>
//                 <br>
//                 <input type="hidden" name="id_barang" value="<?= $id_barang; ? >">
//                 <br />
//                 <button type="submit" name="updatebarang" class="btn btn-warning">Ubah</button>
//             </div>
//         </form>
//     </div>
// </div>
// </div>
// <!-- update modal -->