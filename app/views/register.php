<?php
$pageTitle = "Daftar";
require "header.php";
?>

<div class="auth-layout">
    <div class="auth-brand">
        <div class="auth-brand-logo">
            <div class="auth-brand-logo-dot"></div>
            <span class="auth-brand-logo-name">E-Survei UNSERA</span>
        </div>
        <div class="auth-brand-body">
            <h1 class="auth-brand-heading">Bergabung dan mulai berkontribusi.</h1>
            <p class="auth-brand-desc">Daftarkan diri Anda untuk berpartisipasi dalam survei kepuasan akademik Universitas Serang Raya.</p>
        </div>
        <div class="auth-brand-footer">&copy; <?= date('Y') ?> Universitas Serang Raya</div>
    </div>

    <div class="auth-form-panel">
        <div class="auth-form-inner">
            <h2 class="auth-form-title">Buat Akun</h2>
            <p class="auth-form-sub">Lengkapi data berikut untuk mendaftar.</p>

            <form action="../controller/registerController.php" method="POST" autocomplete="off">
                <div class="form-row">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                           placeholder="nama@unsera.ac.id" autocomplete="off" autofocus required>
                </div>
                <div class="form-row">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama"
                           placeholder="Nama Anda" autocomplete="off" required>
                </div>
                <div class="form-row">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                           placeholder="Buat password" autocomplete="off" required>
                </div>
                <div class="form-row">
                    <label for="role" class="form-label">Peran</label>
                    <select class="form-select" id="role" name="role" required>
                        <option value="" disabled selected>Pilih peran Anda</option>
                        <option value="dosen">Dosen</option>
                        <option value="mahasiswa">Mahasiswa</option>
                    </select>
                </div>
                <div class="auth-submit">
                    <button type="submit" name="register" class="btn btn-primary btn-lg" style="width:100%;justify-content:center;">
                        Daftar <i class="fa-solid fa-arrow-right ms-1"></i>
                    </button>
                </div>
            </form>

            <div class="auth-footer">
                Sudah punya akun? <a href="login.php">Masuk</a>
            </div>
        </div>
    </div>
</div>

<?php require "footer.php"; ?>
