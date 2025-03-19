<?php
session_start();
if (!isset($_SESSION['ssLogin'])) {
    header('location: otentikasi');
    exit();
}
require "../config.php";

if(isset($_POST['save'])){
    $soal = htmlspecialchars($_POST['soal']);
    $gambar = htmlspecialchars($_FILES['gambar']['name']);
    $a = htmlspecialchars($_POST['a']);
    $b = htmlspecialchars($_POST['b']);
    $c = htmlspecialchars($_POST['c']);
    $d = htmlspecialchars($_POST['d']);
    $kunci = htmlspecialchars($_POST['kunci']);

    if ($gambar != null){
        $page = 'add-soal.php';
        $gambar = uploadImg($page);
        
    }else{
        $gambar = '';
    }
    

    mysqli_query($koneksi,"INSERT INTO tbl_soal VALUES (null, '$soal', '$gambar', '$a', '$b', '$c', '$d', '$kunci')");
    
    echo "<script>
    alert('Soal Baru Berhasil Ditambahkan');
    window.location='add-soal.php';
</script>";
return;
}
?>