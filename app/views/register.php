<?php
$pageTitle = "Daftar";
require "header.php";
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

        <h1 class="auth-heading">Buat Akun</h1>
        <p class="auth-subheading">Daftarkan diri untuk mengisi survei kampus.</p>

        <form action="../controller/registerController.php" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                       placeholder="nama@unsera.ac.id" autocomplete="email" autofocus required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama"
                       placeholder="Nama Anda" autocomplete="name" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password"
                       placeholder="Buat password" autocomplete="new-password" required>
            </div>
            <div class="mb-4">
                <label for="role" class="form-label">Peran</label>
                <select class="form-select" id="role" name="role" required>
                    <option value="" disabled selected>Pilih peran Anda</option>
                    <option value="dosen">Dosen</option>
                    <option value="mahasiswa">Mahasiswa</option>
                </select>
            </div>
            <div class="d-grid">
                <button type="submit" name="register" class="btn btn-primary">
                    Daftar <i class="fa-solid fa-id-card ms-1"></i>
                </button>
            </div>
        </form>

        <div class="auth-footer-link text-center">
            Sudah punya akun? <a href="login.php">Masuk</a>
        </div>
    </div>
</div>

<?php require "footer.php"; ?>
