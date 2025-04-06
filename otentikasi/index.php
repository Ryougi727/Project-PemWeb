<?php

session_start();
if(isset($_SESSION['ssLogin'])){
  header('location: ..index.php');
  exit();
}

require '../config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login - Ujian Online</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= $mainUrl ?>vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?= $mainUrl ?>vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= $mainUrl ?>css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= $mainUrl ?>images/layout.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent" style="height: 100vh; padding-top: 100px;">
              <h2 class="text-center">Login</h2>
              <form action="auth.php" method="post" class="pt-4">
                <div class="form-group">
                  <label for="exampleInputEmail">Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-user text-primary"></i>
                      </span>
                    </div>
                    <input type="email" name = "email" class="form-control form-control-lg border-left-0" id="exampleInputEmail" placeholder="Masukkan email anda">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-lock text-primary"></i>
                      </span>
                    </div>
                    <input type="password" name = "password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Password">                        
                  </div>
                </div>
                <div class="my-3 d-grid">
                  <button type="submit" name = "login" class="btn btn-block btn-primary btn-lg">LOGIN</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register.php" class="text-primary">Create</a>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 register-half-bg d-flex flex-row" style="background-image: url('<?= $mainUrl ?>images/auth/sekolah3.png'); background-size: cover; background-position: center;"></div></div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?= $mainUrl ?>vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?= $mainUrl ?>js/off-canvas.js"></script>
  <script src="<?= $mainUrl ?>js/hoverable-collapse.js"></script>
  <script src="<?= $mainUrl ?>js/template.js"></script>
  <script src="<?= $mainUrl ?>js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
