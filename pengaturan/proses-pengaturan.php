<?php
session_start();
if (!isset($_SESSION['ssLogin'])) {
    header('location: otentikasi');
    exit();
}
require "../config.php";

if(isset($_POST['save'])){
    $nama = trim(htmlspecialchars(($_POST['nama'])));
    $waktu = htmlspecialchars(($_POST['waktu']));
    $min = htmlspecialchars(($_POST['minimum']));
    $peraturan = htmlspecialchars(($_POST['peraturan']));

    mysqli_query($koneksi,"UPDATE tbl_pengaturan SET
                                   nama_ujian = '$nama',
                                   waktu = $waktu,
                                   nilai_minimal= $min,
                                   peraturan = '$peraturan'
                                  ");
    
    echo "<script>
    alert('Data Pengaturan Berhasil Diperbaharui');
    window.location='index.php';
</script>";
return;
}
?>