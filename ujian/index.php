<?php

session_start();
if(!isset($_SESSION['ssLogin'])){
  header('location: ../otentikasi');
  exit();
}

require "../config.php";

$title = "Peraturan - Ujian Online";

require "../template/header.php";
require "../template/navbar.php";
require "../template/sidebar.php";

if($_SESSION['ssRole'] !=2){
    echo "<script>
          alert('Halaman Tidak Ditemukan');
          window.location='../';
    </script>";
  exit();
}

?>
   
      
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin mb-3">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h3 class="font-weight-bold mb-0">Peraturan</h3>
                </div>
                <div>
                    <button type="button" class="btn btn-warning btn-icon-text btn-rounded">
                      <i class="ti-angle-double-right btn-icon-prepend"></i> Mulai Ujian
                    </button>
                </div>
              </div>
            </div>
          </div>
         
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- main-panel ends -->
    

      <?php

      require "../template/footer.php";

      ?>