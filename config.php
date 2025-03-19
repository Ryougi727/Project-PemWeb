<?php 


$host = "localhost";
$user = "root";
$pass = "";
$db = "db_ujian";

$koneksi = mysqli_connect($host, $user, $pass, $db);

$mainUrl = "http://localhost/ujian-online/";

function uploadImg($page){
    $fileName = $_FILES['gambar']['name'];
    $size = $_FILES['gambar']['size'];
    $tmp = $_FILES['gambar']['tmp_name'];

    $validEks = ['jpg', 'jpeg', 'png', 'gif'];
    $fileEks = explode('.', $fileName);
    $fileEks = strtolower(end($fileEks));

    if(!in_array($fileEks, $validEks)){
        echo "<script>
        alert('File yang diupload bukan gambar');
        window.location='$page';
        </script>";
        die();
    }

    if($size > 1000000){
        echo "<script>
        alert('Maksimal Ukuran Gambar 1MB');
        window.location='$page';
        </script>";
        die();
    }

    $newName = time().'.'.$fileName;
    move_uploaded_file($tmp, '../images/soal/'.$newName);
    return $newName;
}

?>