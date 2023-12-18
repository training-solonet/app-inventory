<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <title>Admin</title>
  </head>
  <body>
    <!-- bagian navbar -->
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #A9A9A9;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                  <img src="http://localhost/app_inv/gambar%20logo%20connectis.png" alt="" width="200" height="65">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar navbar-light" style="background-color: #A9A9A9;" id="navbarNav">
            <ul class="nav justify-content-end">
                  <li class="nav-item">
                        <a class="nav-link text-white" href="../admin/index.php">Dashboard <span class="sr-only"></span></a>
                  </li>
                  <li class="nav-item">
                        <a class="nav-link text-white" href="../admin/data-barang.php">Barang</a>
                  </li>
                  <li class="nav-item">
                        <a class="nav-link text-white" href="../admin/data-petugas.php">Petugas</a>
                  </li>
                  <li class="nav-item">
                        <a class="nav-link text-white" href="../admin/data-peminjaman.php">Data Peminjaman</a>
                  </li>
                  <li class="nav-item">
                        <a class="nav-link btn btn-danger btn-sm text-white me-md-2" href="logout.php">Keluar</a>
                  </li>
            </ul>
            </div>
        </div>
        </nav>
    