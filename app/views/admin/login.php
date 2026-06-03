<?php
error_reporting(E_ALL);
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    if ($_SESSION['role'] === 'mahasiswa') {
        header("Location: ../mahasiswa/mahasiswa.php");
        exit;
    } elseif ($_SESSION['role'] === 'admin') {
        header("Location: admin.php");
        exit;
    }
}

$pageTitle = "Login Admin";
require "../header.php";
?>

<div class="auth-wrap">
    <div class="auth-card">
        <div class="auth-brand">
            <div class="auth-brand-mark">
                <i class="fa-solid fa-lock"></i>
            </div>
            <div>
                <div class="auth-brand-name">Admin Panel</div>
                <div class="auth-brand-sub">E-Survei UNSERA</div>
            </div>
        </div>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger py-2 px-3 mb-3" style="font-size: var(--text-sm); border-radius: var(--radius-sm);">
                <i class="fa-solid fa-circle-exclamation me-1"></i> <?= htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <h1 class="auth-heading">Masuk Admin</h1>
        <p class="auth-subheading">Akses terbatas untuk administrator.</p>

        <form method="POST" action="../../controller/adminController.php" autocomplete="off">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control"
                       placeholder="Username admin" autocomplete="off" required>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control"
                       placeholder="••••••••" autocomplete="off" required>
            </div>
            <div class="d-grid">
                <button type="submit" name="login" class="btn btn-primary">
                    Masuk <i class="fa-solid fa-arrow-right-to-bracket ms-1"></i>
                </button>
            </div>
        </form>

        <div class="auth-footer-link text-center">
            <a href="../login.php">
                <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke login utama
            </a>
        </div>
    </div>
</div>

<?php require "../footer.php"; ?>
