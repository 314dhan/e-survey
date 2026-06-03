<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['role'] !== 'admin') {
    header("Location: login.php"); exit;
}

require "../../config/Connection.php";

$pageTitle = "Tabel Survei";
$navName   = "E-Survei UNSERA";
require "../navbar.php";

$resultDs  = mysqli_query($conn, "SELECT * FROM survey_ds");
$resultMhs = mysqli_query($conn, "SELECT * FROM survey_mhs");

function getLabel($v) {
    return [1=>'Sangat Kurang', 2=>'Kurang', 3=>'Cukup', 4=>'Baik', 5=>'Sangat Baik'][$v] ?? '—';
}

function getPill($v) {
    return '<span class="ans-pill ans-' . (int)$v . '">' . htmlspecialchars(getLabel($v)) . '</span>';
}
?>

<div class="page-body">
    <div class="page-wrap-wide">
        <div class="page-header">
            <div>
                <h1 class="page-title">Tabel Survei</h1>
                <p class="page-sub">Seluruh data jawaban survei dosen dan mahasiswa.</p>
            </div>
            <a href="admin.php" class="btn btn-secondary btn-sm">
                <i class="fa-solid fa-arrow-left"></i> Kembali
            </a>
        </div>

        <h2 class="section-heading">Survei Dosen</h2>
        <div class="table-wrap">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>No</th><th>Nama</th>
                        <th>P1</th><th>P2</th><th>P3</th><th>P4</th>
                        <th>P5</th><th>P6</th><th>P7</th><th>P8</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n = 1; while ($r = mysqli_fetch_assoc($resultDs)): ?>
                    <tr>
                        <td><?= $n++; ?></td>
                        <td><?= htmlspecialchars($r['nama']); ?></td>
                        <?php for ($j = 1; $j <= 8; $j++): ?>
                        <td><?= getPill($r['jawaban'.$j]); ?></td>
                        <?php endfor; ?>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <h2 class="section-heading">Survei Mahasiswa</h2>
        <div class="table-wrap">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>No</th><th>Nama</th>
                        <th>P1</th><th>P2</th><th>P3</th><th>P4</th>
                        <th>P5</th><th>P6</th><th>P7</th><th>P8</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n = 1; while ($r = mysqli_fetch_assoc($resultMhs)): ?>
                    <tr>
                        <td><?= $n++; ?></td>
                        <td><?= htmlspecialchars($r['nama']); ?></td>
                        <?php for ($j = 1; $j <= 8; $j++): ?>
                        <td><?= getPill($r['jawaban'.$j]); ?></td>
                        <?php endfor; ?>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <a href="admin.php" class="btn btn-secondary btn-sm">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
        </a>
    </div>
</div>

<?php require "../footer.php"; ?>
