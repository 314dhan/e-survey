<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$pageTitle = "admin";
$navName = "E-Survey Kampus Universitas Serang Raya";
require "../navbar.php" ?>
<div class="container mt-3 mb-3">
    <div class="row">
        <div class="col-sm-6 adm">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Table Survey</h5>
                    <p class="card-text">Isi dari hasil survey berupa table.</p>
                    <a href="Table.php" class="btn btn-primary tombol-pad">Klik</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 adm">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Chart Dosen</h5>
                    <p class="card-text">Berisi chart survey.</p>
                    <a href="chartDosen.php" class="btn btn-primary tombol-pad">Klik</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-sm-6 adm">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pertanyaan</h5>
                    <p class="card-text">Isi dari pertanyaan survey.</p>
                    <a href="pertanyaan.php" class="btn btn-primary tombol-pad">Klik</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 adm">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Chart Mahasiswa</h5>
                    <p class="card-text">Isi dari pertanyaan survey.</p>
                    <a href="chartMahasiswa.php" class="btn btn-primary tombol-pad">Klik</a>
                </div>
            </div>
        </div>
    </div>
</div>