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
  <title>Registrasi - Ujian Online</title>
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
            <div class="auth-form-transparent py-5" style="width: 80%; height: 100vh;">
              <h2 class="text-center">Registrasi</h2>
              <form action="auth.php" method="POST" class="pt-4">
                <div class="row">
                  <div class="form-group col-6">
                    <label>Fullname</label>
                    <div class="input-group">
                      <div class="input-group-prepend bg-transparent">
                        <span class="input-group-text bg-transparent border-right-0">
                          <i class="ti-user text-primary"></i>
                        </span>
                      </div>
                      <input type="text" name = "fullname" class="form-control form-control-lg border-left-0 ps-3" placeholder="Your name">
                    </div>
                  </div>
                  <div class="form-group col-6">
                    <label>Username</label>
                    <div class="input-group">
                      <div class="input-group-prepend bg-transparent">
                        <span class="input-group-text bg-transparent border-right-0">
                          <i class="ti-user text-primary"></i>
                        </span>
                      </div>
                      <input type="text" name = "username" class="form-control form-control-lg border-left-0 ps-3 " placeholder="Username">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-6">
                    <label>Email</label>
                    <div class="input-group">
                      <div class="input-group-prepend bg-transparent">
                        <span class="input-group-text bg-transparent border-right-0">
                          <i class="ti-email text-primary"></i>
                        </span>
                      </div>
                      <input type="email" name = "email" class="form-control form-control-lg border-left-0 ps-3" placeholder="Your email">
                    </div>
                  </div>
                  <div class="form-group col-6">
                    <label>NIS</label>
                    <div class="input-group">
                      <div class="input-group-prepend bg-transparent">
                        <span class="input-group-text bg-transparent border-right-0">
                          <i class="ti-mobile text-primary"></i>
                        </span>
                      </div>
                      <input type="text" name = "nis" class="form-control form-control-lg border-left-0 ps-3" placeholder="Nomor Induk Siswa">
                    </div>
                  </div>             
                </div>
                <div class="row">
                  <div class="form-group col-6">
                    <label>Password</label>
                    <div class="input-group">
                      <div class="input-group-prepend bg-transparent">
                        <span class="input-group-text bg-transparent border-right-0">
                          <i class="ti-lock text-primary"></i>
                        </span>
                      </div>
                      <input type="password" name = "password" class="form-control form-control-lg border-left-0 ps-3" id="exampleInputPassword" placeholder="Password">                        
                    </div>
                  </div>
                  <div class="form-group col-6">
                    <label>Confirm Password</label>
                    <div class="input-group">
                      <div class="input-group-prepend bg-transparent">
                        <span class="input-group-text bg-transparent border-right-0">
                          <i class="ti-lock text-primary"></i>
                        </span>
                      </div>
                      <input type="password" name = "password2" class="form-control form-control-lg border-left-0 ps-3" id="exampleInputPassword" placeholder="Repeat your password">                        
                    </div>
                  </div>
                </div>
                <div class="mt-3 d-grid">
                  <button type="submit" name = "register" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="index.php" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 register-half-bg d-flex flex-row">
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
