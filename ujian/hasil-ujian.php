<?php

session_start();
if(!isset($_SESSION['ssLogin'])){
  header('location: ../otentikasi');
  exit();
}

require "../config.php";

$title = "Hasil Ujian - Ujian Online";

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

//cek apakah sudah ada ujian yang diambil
$idUser = $_SESSION['ssId'];
$queryHasil = mysqli_query($koneksi, "SELECT * FROM tbl_nilai WHERE id_user='$idUser'");
$hasil    = mysqli_fetch_assoc($queryHasil);
$cekHasil = mysqli_num_rows($queryHasil);
if (!$cekHasil){
  echo "<script>
        window.location='index.php';
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
                  <h3 class="font-weight-bold mb-0">Hasil Ujian</h3>
                </div>
                <div>
                    <button type="button" class="btn btn-info fw-bold btn-rounded">
                      Tanggal <?= in_date($hasil['tanggal']) ?>
                    </button>
                </div>
              </div>
            </div>
          </div>
         <div class="card">
          <div class="card-body text-center py-5">
            <div class="my-5 pb-5">
                <h4 class = "mb-3">Anda Telah Menyelesaikan Ujian</h4>
                <div class="d-flex justify-content-center mt-5">
                    <span class="me-2">Jumlah Jawaban Benar : <span class="bg-primary text-white px-2 py-1 rounded-circle"><?= $hasil['benar'] ?></span></span>
                    <span class="me-2">Jumlah Jawaban Salah : <span class="bg-warning fw-bold px-2 py-1 rounded-circle"><?= $hasil['salah'] ?></span></span>
                    <span class="me-2">Jumlah Jawaban Kosong : <span class="border border-dark  px-2 py-1 rounded-circle"><?= $hasil['kosong'] ?></span></span>
                </div>
                <div class="d-flex justify-content-center my-4">
                    <button class="btm btn-dark text-white mb-2 fs-6">Nilai  : <?= $hasil['nilai']?></button>
                </div>
                <?php
                  if ($hasil['status'] == 'LULUS'){
                     echo '<h5>Selamat Anda <span class= "bg-success text-white px-2 py-1 rounded">LULUS</span> dalam Ujian Ini</h5>';
                  }else {
                     echo '<h5>Maaf Anda <span class= "bg-danger text-white px-2 py-1 rounded">TIDAK LULUS</span> dalam Ujian Ini</h5>';
                  }

                ?>
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