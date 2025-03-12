<?php

session_start();
require '../config.php';

//registrasi

if (isset($_POST['register'])) {
  $fullname = htmlspecialchars($_POST['fullname']);
  $username = htmlspecialchars($_POST['username']);
  $email = htmlspecialchars($_POST['email']);
  $nis = htmlspecialchars($_POST['nis']);
  $password = htmlspecialchars($_POST['password']);
  $password2 = htmlspecialchars($_POST['password2']);

  $cekSiswa = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE user_id = '$nis' or email = '$email'");
  if (mysqli_num_rows($cekSiswa)) {
    echo "<script>
           alert('nis atau email sudah tedaftar, user baru gagal di registrasi !');
           window.location='register.php';
    </script>";
    return;
  }

  if ($password !== $password2) {
    echo "<script>
           alert('konfirmasi password tidak sama, user baru gagal di registrasi !');
           window.location='register.php';
    </script>";
    return;
  }

  $pass = password_hash($password, PASSWORD_DEFAULT);

  mysqli_query($koneksi, "INSERT INTO tbl_user VALUES (null, '$nis', '$fullname', '$username', '$email', '$pass', 2)");

  echo "<script>
           alert('user baru berhasil di registrasi !, silahkan login !');
           window.location='index.php';
    </script>";
    return;
}

// login
if (isset($_POST['login'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $queryUser = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE email = '$email'");

    if (mysqli_num_rows($queryUser)) {
        $user = mysqli_fetch_assoc($queryUser);
        if (password_verify($password, $user["password"])) {
            // set sesion
            $_SESSION['ssLogin'] = true;
            $_SESSION['ssFull'] = $user['fullname'];
            $_SESSION['ssUser'] = $user['username'];
            $_SESSION['ssId'] = $user['user_id'];
            $_SESSION['ssRole'] = $user['role'];

            if ($_SESSION ['ssRole'] == 1 ){
                header('location: ../index.php');
            }else {
                header('location: ../ujian');
            }
            exit();
        } else {
            echo "<script>
                alert('email atau password salah, login gagal');
                window.location='index.php';
                </script>";
            exit();
        }
    } else {
        echo "<script>
            alert('user tidak ditemukan, silahkan registrasi terlebih dahulu');
            window.location='register.php';
            </script>";
        exit();
    }
}

?>