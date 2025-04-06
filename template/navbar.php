 <!-- navbar -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo me-5 text-secondary" href="#">Ujian Online</a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><i class="ti-shield menu-icon text-secondary"></i></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <?php
            if ($_SESSION['ssRole'] == 1){
                         echo  '<button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                      <span class="ti-view-list"></span></button>';
            }else{
              echo'<a class="navbar-brand brand-logo me-5 text-secondary fs-3" href="#">Ujian Online</a>';
            }
        ?>
        
       
        <ul class="navbar-nav navbar-nav-right" id="nav_user">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
              <?= 'Selamat datang, <b>' . $_SESSION['ssUser'] . '</b>' ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-user text-primary"></i>
                Profile
              </a>
              <a class="dropdown-item" href="<?=$mainUrl ?>otentikasi/logout.php">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>

        <ul class="navbar-nav navbar-nav-right" id="nav_ujian">
    <li class="nav-item dropdown">
        <?php if (basename($_SERVER['PHP_SELF']) == 'soal.php'): ?>
            <span class="fw-bold fs-6 me-2">Sisa Waktu:</span>
            <button type="button" class="btn btn-outline-danger btn-xs fs-6" id="sisa">
                <?= isset($ujian['waktu']) ? durasi($ujian['waktu']) : '00:00:00' ?>
            </button>
        <?php endif; ?>
    </li>
</ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="ti-view-list"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

    