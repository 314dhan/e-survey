<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['role'] !== 'admin') {
    header("Location: login.php"); exit;
}

$pageTitle = "Dashboard";
$navName   = "E-Survei UNSERA";
require "../navbar.php";
?>

<div class="page-body">
    <div class="page-wrap">
        <div class="page-header">
            <div>
                <h1 class="page-title">Dashboard</h1>
                <p class="page-sub">Ringkasan dan navigasi hasil survei kampus.</p>
            </div>
        </div>

        <nav class="admin-list" aria-label="Menu admin">
            <a href="Table.php" class="admin-list-item">
                <div class="admin-list-icon"><i class="fa-solid fa-table-list"></i></div>
                <div class="admin-list-text">
                    <div class="admin-list-title">Tabel Survei</div>
                    <div class="admin-list-desc">Lihat seluruh jawaban mahasiswa dan dosen dalam format tabel.</div>
                </div>
                <i class="fa-solid fa-arrow-right admin-list-arrow"></i>
            </a>

            <a href="chartDosen.php" class="admin-list-item">
                <div class="admin-list-icon"><i class="fa-solid fa-chart-pie"></i></div>
                <div class="admin-list-text">
                    <div class="admin-list-title">Chart Dosen</div>
                    <div class="admin-list-desc">Visualisasi distribusi jawaban survei dari dosen per pertanyaan.</div>
                </div>
                <i class="fa-solid fa-arrow-right admin-list-arrow"></i>
            </a>

            <a href="chartMahasiswa.php" class="admin-list-item">
                <div class="admin-list-icon"><i class="fa-solid fa-chart-bar"></i></div>
                <div class="admin-list-text">
                    <div class="admin-list-title">Chart Mahasiswa</div>
                    <div class="admin-list-desc">Visualisasi distribusi jawaban survei dari mahasiswa per pertanyaan.</div>
                </div>
                <i class="fa-solid fa-arrow-right admin-list-arrow"></i>
            </a>

            <a href="pertanyaan.php" class="admin-list-item">
                <div class="admin-list-icon"><i class="fa-solid fa-circle-question"></i></div>
                <div class="admin-list-text">
                    <div class="admin-list-title">Kelola Pertanyaan</div>
                    <div class="admin-list-desc">Lihat dan perbarui daftar pertanyaan survei dosen dan mahasiswa.</div>
                </div>
                <i class="fa-solid fa-arrow-right admin-list-arrow"></i>
            </a>
        </nav>
    </div>
</div>

<?php require "../footer.php"; ?>
