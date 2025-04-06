<?php
session_start();
if (!isset($_SESSION['ssLogin'])) {
    header('location: otentikasi');
    exit();
}
require "../config.php";

$title = "Soal - Ujian Online";

require "../template/header.php";


if ($_SESSION['ssRole'] != 1) {
    echo "<script>
          alert('Halaman Tidak Ditemukan');
          window.location='../ujian';
    </script>";
    exit();
}

$id = $_GET["id"];

$querySoal = mysqli_query($koneksi, "SELECT * FROM tbL_soal WHERE id=$id");
$soal      = mysqli_fetch_assoc($querySoal);

?>

<div class="m-3">
    <h3 class = "mb-3">Soal</h3>
    <div class="d-flex justify-content-start">
        <?php 
           if ($soal['gambar'] != '') { ?>
              <img src="../images/soal/<?= $soal['gambar'] ?>" alt="" width="200px" class="mb-4 me-3">
        <?php } ?>
        <div><?=html_entity_decode($soal['pertanyaan'])?></div>
    </div>
    <p>a. <?=$soal['a'] ?></p>    
    <p>b. <?=$soal['b'] ?></p>    
    <p>c. <?=$soal['c'] ?></p>    
    <p>d. <?=$soal['d'] ?></p>    

    <h5 class = "mt-3">Kunci Jawaban : <?= $soal['kunci_jawaban']?></h5>
</div>

<?php
require "../template/footer.php";
?>