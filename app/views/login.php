<?php
error_reporting(E_ALL);
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    if ($_SESSION['role'] === 'mahasiswa') {
        header("Location: mahasiswa/mahasiswa.php");
        exit;
    } elseif ($_SESSION['role'] === 'dosen') {
        header("Location: dosen/dosen.php");
        exit;
    }
}

$pageTitle = "Masuk";
require "header.php";

if (isset($_SESSION['error_message'])) {
    $error = $_SESSION['error_message'];
    unset($_SESSION['error_message']);
}
?>

<div class="auth-wrap">
    <div class="auth-card">
        <div class="auth-brand">
            <div class="auth-brand-mark">
                <i class="fa-solid fa-chart-simple"></i>
            </div>
            <div>
                <div class="auth-brand-name">E-Survei UNSERA</div>
                <div class="auth-brand-sub">Universitas Serang Raya</div>
            </div>
        </div>

        <?php if (!empty($error)): ?>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Login Gagal',
                        text: 'Email atau password tidak sesuai.',
                        confirmButtonColor: 'oklch(0.47 0.155 152)'
                    });
                });
            </script>
        <?php endif; ?>

        <h1 class="auth-heading">Masuk</h1>
        <p class="auth-subheading">Akses survei dengan akun Anda.</p>

        <form method="POST" action="../controller/loginController.php">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control"
                       placeholder="nama@unsera.ac.id" autocomplete="email" autofocus required>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control"
                       placeholder="••••••••" autocomplete="current-password" required>
            </div>
            <div class="d-grid">
                <button type="submit" name="login" class="btn btn-primary">
                    Masuk <i class="fa-solid fa-arrow-right-to-bracket ms-1"></i>
                </button>
            </div>
        </form>

        <div class="auth-footer-link text-center">
            Belum punya akun? <a href="register.php">Daftar sekarang</a>
        </div>

        <div class="auth-divider">Admin</div>

        <div class="d-grid">
            <a href="admin/login.php" class="btn btn-outline-secondary btn-sm">
                <i class="fa-solid fa-lock me-1"></i> Masuk sebagai Admin
            </a>
        </div>
    </div>
</div>

<?php require "footer.php"; ?>
