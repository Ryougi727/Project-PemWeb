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
   
      

    

      <?php

      require "template/footer.php";

      ?>