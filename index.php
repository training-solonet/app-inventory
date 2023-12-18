<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>Aplikasi Inventory</title>
  </head>
  <body>
    
    <!-- pesan kesalahan -->
    <?php
      session_start();
        if(isset($_SESSION['error'])) {
    ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <center><?= $_SESSION['error']; ?></center>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>

<?php } ?>

<!-- Form Login -->
<section class="vh-100" style="background-color: #A9A9A9;">
  <div class="container py-5 h-100">
  
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
      <!-- <img src="http://localhost/app_inv/gambar%20logo%20connectis.png" alt="" width="155" height="45" style="position: absolute; top: 0; left: 0; z-index: 1;"> -->
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div style="display: flex; align-items: center; justify-content: center;">
            <img src="http://localhost/app_inv/gambar%20logo%20connectis.png" alt="" width="155" height="45" style="position: absolute; top: 0; left: 0; z-index: 1;">
                <img src="https://siap.pari.or.id/packages/tugumuda/login/images/gambar-login.png"
                    alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; max-width: 40%;" />
                <div class="card" style="margin-left: 20px;">
                    <!-- Konten Vertikal Card di sini -->
                
             <!-- <div class="col-md-6 col-lg-7 d-flex align-items-center"> -->
              <div class="card-body p-4 p-lg-5 text-black"> 

                <form method="POST" action="proses/login_proses.php" autocomplete="off">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Inventory Sambeng</span>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control form-control-lg" placeholder="Masukan Username" autofocus/>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Masukan Password"/>
                  </div>

                  <div class="form-outline mb-4">
                      <label class="form-label" for="level">Level</label>
                      <select name="level" id="level" class="form-select form-control-lg" aria-label="Default select example">
                          <option selected>-- Masuk Sebagai ---</option>
                          <option value="2">Operator</option>
                          <option value="1">Admin</option>

                      </select>
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" type="submit" VALUE="login">Login</button>
                  </div>
                </form>

              </div>
            </div>
          </div>
          </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>