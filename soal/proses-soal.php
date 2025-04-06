<?php
session_start();
if (!isset($_SESSION['ssLogin'])) {
    header('location: otentikasi');
    exit();
}
require "../config.php";

if(isset($_POST['update'])){
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

// Hapus soal
if (isset($_GET['op']) && $_GET['op'] == 'delete') {
    $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
    $gbr = isset($_GET['gbr']) ? htmlspecialchars($_GET['gbr']) : '';

    if ($id <= 0) {
        echo "<script>
              alert('ID soal tidak valid');
              window.location='index.php';
        </script>";
        exit();
    }

    // Hapus data soal dari database
    $result = mysqli_query($koneksi, "DELETE FROM tbl_soal WHERE id = $id");
    if (!$result) {
        echo "<script>
              alert('Gagal menghapus soal');
              window.location='index.php';
        </script>";
        exit();
    }

    // Hapus file gambar jika ada
    if (!empty($gbr)) {
        $filePath = '../images/soal/' . $gbr;
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

    echo "<script>
          alert('Soal berhasil dihapus');
          window.location='index.php';
    </script>";
    return;
}

//update soal
if(isset($_POST['save'])){
    $id = $_POST['id'];
    $soal = htmlspecialchars($_POST['soal']);
    $gambar = htmlspecialchars($_FILES['gambar']['name']);
    $gbrLama = htmlspecialchars($_POST['gambarlama']);
    $a = htmlspecialchars($_POST['a']);
    $b = htmlspecialchars($_POST['b']);
    $c = htmlspecialchars($_POST['c']);
    $d = htmlspecialchars($_POST['d']);
    $kunci = htmlspecialchars($_POST['kunci']);

    if ($gambar != null){
        $page = 'index.php';
        $gbrSoal = uploadImg($page);
        @unlink('../images/soal/'.$gbrLama);
    }else{
        $gbrSoal = $gbrLama;
    }
    

   mysqli_query($koneksi,"UPDATE tbl_soal SET pertanyaan = '$soal', gambar = '$gbrSoal', a = '$a', b = '$b', c = '$c', d = '$d', kunci_jawaban = '$kunci' WHERE id = $id");
    
    echo "<script>
    alert('Soal Baru Berhasil Diperbarui');
    window.location='index.php';
</script>";
return;
}

?>