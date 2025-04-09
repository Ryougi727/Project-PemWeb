<?php
session_start();
if (!isset($_SESSION['ssLogin'])) {
    header('location: otentikasi');
    exit();
}
require "../config.php";

// Fungsi untuk mengunggah gambar



// Tambah soal
if (isset($_POST['save'])) {
    $soal = htmlspecialchars($_POST['soal']);
    $gambar = !empty($_FILES['gambar']['name']) ? uploadImg('add-soal.php') : '';
    $a = htmlspecialchars($_POST['a']);
    $b = htmlspecialchars($_POST['b']);
    $c = htmlspecialchars($_POST['c']);
    $d = htmlspecialchars($_POST['d']);
    $kunci = htmlspecialchars($_POST['kunci']);

    $query = "INSERT INTO tbl_soal (pertanyaan, gambar, a, b, c, d, kunci_jawaban) 
              VALUES ('$soal', '$gambar', '$a', '$b', '$c', '$d', '$kunci')";
    if (mysqli_query($koneksi, $query)) {
        echo "<script>
              alert('Soal Baru Berhasil Ditambahkan');
              window.location='add-soal.php';
        </script>";
    } else {
        echo "<script>
              alert('Gagal menambahkan soal: " . mysqli_error($koneksi) . "');
              window.location='add-soal.php';
        </script>";
    }
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

// Update soal
if (isset($_POST['update'])) {
    // Validasi ID
    if (!isset($_POST['id']) || empty($_POST['id']) || !is_numeric($_POST['id'])) {
        echo "<script>
              alert('ID tidak valid');
              window.location='index.php';
        </script>";
        return;
    }

    $id = intval($_POST['id']);
    $soal = htmlspecialchars($_POST['soal']);
    $gambar = htmlspecialchars($_FILES['gambar']['name']);
    $gbrLama = htmlspecialchars($_POST['gambarlama']);
    $a = htmlspecialchars($_POST['a']);
    $b = htmlspecialchars($_POST['b']);
    $c = htmlspecialchars($_POST['c']);
    $d = htmlspecialchars($_POST['d']);
    $kunci = htmlspecialchars($_POST['kunci']);

    if (!empty($_FILES['gambar']['name'])) {
        $gbrSoal = uploadImg('index.php');
        @unlink('../images/soal/' . $gbrLama); // Hapus gambar lama
    } else {
        $gbrSoal = $gbrLama;
    }

    $query = "UPDATE tbl_soal SET pertanyaan = '$soal', gambar = '$gbrSoal', a = '$a', b = '$b', c = '$c', d = '$d', kunci_jawaban = '$kunci' WHERE id = $id";
    if (mysqli_query($koneksi, $query)) {
        echo "<script>
              alert('Soal Berhasil Diperbarui');
              window.location='index.php';
        </script>";
    } else {
        echo "<script>
              alert('Gagal memperbarui soal: " . mysqli_error($koneksi) . "');
              window.location='index.php';
        </script>";
    }
    return;
}
?>