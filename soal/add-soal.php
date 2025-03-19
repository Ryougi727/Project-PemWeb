<?php
session_start();
if (!isset($_SESSION['ssLogin'])) {
    header('location: otentikasi');
    exit();
}
require "../config.php";

$title = "Soal - Ujian Online";

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

?>

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <form action="proses-soal.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12 grid-margin mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="font-weight-bold mb-0">Tambah Soal</h3>
                        </div>
                        <div>
                            <a href="index.php" class="btn btn-warning btn-icon-text btn-rounded">
                                <i class="ti-back-left btn-icon-prepend"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Rincian Soal</p>
                        <div class="col-md-9">
                            <div class="form-group row mb-2">
                                <label for="pertanyaan"class="col-sm-3 col-form-label-sm">Pertanyaan</label>
                                <div class="col-sm-9">
                                    <textarea name="soal" id="editor"></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="gambar" class="col-sm-3 col-form-label-sm">Gambar</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control form-control-sm" name="gambar">
                                    <span class="text-small">Type file gambar JPG | JPEG | PNG | GIF</span> 
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="a" class="col-sm-3 col-form-label-sm">Jawaban A</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" placeholder="plihan jawaban A" name="a" required>
                                    
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="b" class="col-sm-3 col-form-label-sm">Jawaban B</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" placeholder="plihan jawaban B" name="b" required>
                                    
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="c" class="col-sm-3 col-form-label-sm">Jawaban C</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" placeholder="plihan jawaban C" name="c" required>
                                    
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="a" class="col-sm-3 col-form-label-sm">Jawaban D</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" placeholder="plihan jawaban D" name="d" required>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="kunci" class="col-sm-3 col-form-label-sm">Kunci Jawaban</label>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                       <label class="form-check-label">
                                           <input type="radio" class="form-check-input" name="kunci" value="A" required>A
                                       </label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                       <label class="form-check-label">
                                           <input type="radio" class="form-check-input" name="kunci" value="B" required>B
                                       </label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                       <label class="form-check-label">
                                           <input type="radio" class="form-check-input" name="kunci" value="C" required>C
                                       </label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                       <label class="form-check-label">
                                           <input type="radio" class="form-check-input" name="kunci" value="D" required>D
                                       </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="" class="col-sm-3 col-form-label-sm"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary btn-icon-text btn-rounded" name="save"> <i class="ti-save-alt btn-icon-prepend"></i>Simpan</button>
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