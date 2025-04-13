<?php
session_start();
if (!isset($_SESSION['ssLogin'])) {
    header('location: otentikasi');
    exit();
}
require "../config.php";

$title = "Pengaturan - Ujian Online";

require "../template/header.php";
require "../template/navbar.php";
require "../template/sidebar.php";

if ($_SESSION['ssRole'] != 1) {
    echo "<script>
          alert('Halaman Tidak Ditemukan');
          window.location='../ujian';
    </script>";
    exit();
}

$query = mysqli_query($koneksi, "SELECT * FROM tbl_pengaturan");
$row = mysqli_fetch_assoc($query);
?>

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <form action="proses-pengaturan.php" method="POST">
            <div class="row">
                <div class="col-md-12 grid-margin mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="font-weight-bold mb-0">Pengaturan</h3>
                        </div>
                        <div>
                            <button type="submit" name="save" class="btn btn-warning btn-icon-text btn-rounded">
                                <i class="ti-clipboard btn-icon-prepend"></i> Simpan
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Pengaturan Ujian</p>
                        <div class="col-md-9">
                            <div class="form-group row mb-2">
                                <label for="nama" class="col-form-label-sm col-sm-3">Nama Ujian</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="nama" placeholder="nama ujian" name="nama" value= "<?= $row['nama_ujian'] ?>"required>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="waktu" class="col-form-label-sm col-sm-3">Waktu Ujian</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="waktu" placeholder="waktu pengerjaan (menit)" name="waktu" value= "<?= $row['waktu'] ?>" pattern="[0-9]+" title="hanya angka" required>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="minimum" class="col-form-label-sm col-sm-3">Nilai Minimum</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="minimum" placeholder="minimal nilai kelulusan" name="minimum" value= "<?= $row['nilai_minimal'] ?>" pattern="[0-9]+" title="hanya angka" required>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="peraturan" class="col-form-label-sm col-sm-3">Peraturan</label>
                                <div class="col-sm-9">
                                    <textarea name="peraturan" id="editor" style="width: 100%; height: 200px;"><?= $row['peraturan'] ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- content-wrapper ends -->
<!-- main-panel ends -->

<?php
require "../template/footer.php";
?>