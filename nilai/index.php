<?php
session_start();
if (!isset($_SESSION['ssLogin'])) {
    header('location: otentikasi');
    exit();
}
require "../config.php";

$title = "Nilai Ujian - Ujian Online";

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

$query = mysqli_query($koneksi, "SELECT * FROM tbl_nilai");
$row = mysqli_fetch_assoc($query);
?>


<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Daftar Nilai Ujian</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="mytable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>ID User</th>
                                        <th>Benar</th>
                                        <th>Salah</th>
                                        <th>Kosong</th>
                                        <th>Nilai</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (mysqli_num_rows($query) > 0): ?>
                                        <?php while ($row = mysqli_fetch_assoc($query)): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($row['id']); ?></td>
                                                <td><?= htmlspecialchars($row['id_user']); ?></td>
                                                <td><?= htmlspecialchars($row['benar']); ?></td>
                                                <td><?= htmlspecialchars($row['salah']); ?></td>
                                                <td><?= htmlspecialchars($row['kosong']); ?></td>
                                                <td><?= htmlspecialchars($row['nilai']); ?></td>
                                                <td><?= htmlspecialchars($row['tanggal']); ?></td>
                                                <td><?= htmlspecialchars($row['status']); ?></td>
                                            </tr>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="8" class="text-center">Tidak ada data nilai.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require "../template/footer.php"; ?>