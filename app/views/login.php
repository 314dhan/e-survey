<?php
error_reporting(E_ALL);
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    if ($_SESSION['role'] === 'mahasiswa') { header("Location: mahasiswa/mahasiswa.php"); exit; }
    if ($_SESSION['role'] === 'dosen')     { header("Location: dosen/dosen.php"); exit; }
}

$pageTitle = "Masuk";
require "header.php";

if (isset($_SESSION['error_message'])) {
    $error = $_SESSION['error_message'];
    unset($_SESSION['error_message']);
}
?>

<div class="auth-layout">
    <div class="auth-brand">
        <div class="auth-brand-logo">
            <div class="auth-brand-logo-dot"></div>
            <span class="auth-brand-logo-name">E-Survei UNSERA</span>
        </div>
        <div class="auth-brand-body">
            <h1 class="auth-brand-heading">Suara Anda membangun kampus kita.</h1>
            <p class="auth-brand-desc">Sistem survei kepuasan akademik Universitas Serang Raya. Masukan Anda digunakan untuk meningkatkan kualitas layanan dan fasilitas kampus.</p>
        </div>
        <div class="auth-brand-footer">&copy; <?= date('Y') ?> Universitas Serang Raya</div>
    </div>

    <div class="auth-form-panel">
        <div class="auth-form-inner">
            <?php if (!empty($error)): ?>
            <div class="auth-error">
                <i class="fa-solid fa-circle-exclamation" style="margin-top:2px;flex-shrink:0"></i>
                Email atau password tidak sesuai.
            </div>
            <?php endif; ?>

            <h2 class="auth-form-title">Masuk</h2>
            <p class="auth-form-sub">Masukkan akun Anda untuk melanjutkan.</p>

            <form method="POST" action="../controller/loginController.php" autocomplete="off">
                <div class="form-row">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control"
                           placeholder="nama@unsera.ac.id" autocomplete="off" autofocus required>
                </div>
                <div class="form-row">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control"
                           placeholder="••••••••" autocomplete="off" required>
                </div>
                <div class="auth-submit">
                    <button type="submit" name="login" class="btn btn-primary btn-lg" style="width:100%;justify-content:center;">
                        Masuk <i class="fa-solid fa-arrow-right ms-1"></i>
                    </button>
                </div>
            </form>

            <div class="auth-footer">
                Belum punya akun? <a href="register.php">Daftar sekarang</a>
            </div>

            <div class="auth-or">atau</div>

            <a href="admin/login.php" class="btn btn-secondary" style="width:100%;justify-content:center;">
                <i class="fa-solid fa-lock"></i> Masuk sebagai Admin
            </a>
        </div>
    </div>
</div>

<?php require "footer.php"; ?>
