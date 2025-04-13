<?php


session_start();
if(!isset($_SESSION['ssLogin'])){
  header('location: otentikasi');
  exit();
}
require "config.php";

$title = "Dashboard - Ujian Online";

require "template/header.php";
require "template/navbar.php";
require "template/sidebar.php";

if($_SESSION['ssRole'] !=1){
    echo "<script>
          alert('Halaman Tidak Ditemukan');
          window.location='ujian';
    </script>";
  exit();
}

?>

<div class="container mt-4">
  <!-- School Profile Section -->
  <div class="card shadow-sm mb-4">
    <div class="card-header bg-dark text-white">
      <h4 class="mb-0">Profil Sekolah</h4>
    </div>
    <div class="card-body">
      <p style="font-size: 16px;">Selamat datang di portal Ujian Online. Sekolah kami berdedikasi untuk memberikan pendidikan terbaik dengan fasilitas modern dan tenaga pengajar profesional.</p>
    </div>
  </div>

  <!-- Image Section -->
  <div class="text-center mb-4">
    <img src="<?= $mainUrl ?>images/auth/imit.jpg" /> <alt="Profil Sekolah" class="img-fluid rounded" style="max-height: 300px;">
  </div>

  <!-- School Information Section -->
  <div class="card shadow-sm mb-4">
    <div class="card-header bg-dark text-white">
      <h4 class="mb-0">Informasi Sekolah</h4>
    </div>
    <div class="card-body">
      <ul class="list-unstyled">
        <li><strong>Alamat:</strong> Jl. Pendidikan No. 123, Kota Edukasi</li>
        <li><strong>Telepon:</strong> (021) 12345678</li>
        <li><strong>Email:</strong> info@sekolahonline.ac.id</li>
        <li><strong>Website:</strong> <a href="https://www.sekolahonline.ac.id" target="_blank">www.sekolahonline.ac.id</a></li>
      </ul>
    </div>
  </div>
</div>

<?php

require "template/footer.php";

?>