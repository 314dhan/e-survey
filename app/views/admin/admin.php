<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$pageTitle = "Dashboard Admin";
$navName = "E-Survei UNSERA";
require "../navbar.php";
?>

<div class="admin-body">
    <div class="container">
        <h1 class="admin-page-title">Dashboard</h1>
        <p class="admin-page-sub">Ringkasan hasil survei kampus Universitas Serang Raya.</p>

        <div class="row g-3">
            <div class="col-sm-6 col-lg-3">
                <div class="admin-nav-card h-100">
                    <div class="admin-nav-icon">
                        <i class="fa-solid fa-table-list"></i>
                    </div>
                    <h2 class="admin-nav-title">Tabel Survei</h2>
                    <p class="admin-nav-desc">Lihat seluruh hasil survei mahasiswa dan dosen dalam format tabel.</p>
                    <a href="Table.php" class="btn btn-primary btn-sm align-self-start">
                        Buka Tabel <i class="fa-solid fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="admin-nav-card h-100">
                    <div class="admin-nav-icon">
                        <i class="fa-solid fa-chart-pie"></i>
                    </div>
                    <h2 class="admin-nav-title">Chart Dosen</h2>
                    <p class="admin-nav-desc">Visualisasi distribusi jawaban survei dari dosen.</p>
                    <a href="chartDosen.php" class="btn btn-primary btn-sm align-self-start">
                        Lihat Chart <i class="fa-solid fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="admin-nav-card h-100">
                    <div class="admin-nav-icon">
                        <i class="fa-solid fa-chart-pie" style="color: var(--color-accent)"></i>
                    </div>
                    <h2 class="admin-nav-title">Chart Mahasiswa</h2>
                    <p class="admin-nav-desc">Visualisasi distribusi jawaban survei dari mahasiswa.</p>
                    <a href="chartMahasiswa.php" class="btn btn-primary btn-sm align-self-start">
                        Lihat Chart <i class="fa-solid fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="admin-nav-card h-100">
                    <div class="admin-nav-icon">
                        <i class="fa-solid fa-circle-question"></i>
                    </div>
                    <h2 class="admin-nav-title">Pertanyaan</h2>
                    <p class="admin-nav-desc">Kelola daftar pertanyaan yang digunakan dalam survei.</p>
                    <a href="pertanyaan.php" class="btn btn-primary btn-sm align-self-start">
                        Kelola <i class="fa-solid fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require "../footer.php"; ?>
