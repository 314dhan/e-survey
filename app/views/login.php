<?php
error_reporting(E_ALL);
session_start();

// Cek apakah pengguna sudah login menggunakan session
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    // Jika pengguna sudah login, redirect ke halaman yang sesuai
    if($_SESSION['role'] === 'mahasiswa'){
        header("Location: mahasiswa/mahasiswa.php");
        exit;
    } elseif($_SESSION['role'] === 'dosen'){
        header("Location: dosen/dosen.php");
        exit;
    }
}

$pageTitle = "Login";
require "header.php";

if(isset($_SESSION['error_message'])){
    $error = $_SESSION['error_message'];
    unset($_SESSION['error_message']);
}
?>
    <?php if(isset($error)) :?>
        <p style="color: red; font-style: italic;">email atau password salah</p>
    <?php endif; ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="login-container">
                    <?php if(!empty($error)) { ?>
                        <script>
                            alert("<?php echo $error; ?>");
                            location.reload();
                        </script>
                    <?php } ?>
                    <h2 class="text-center">Form Login</h2>
                    <h5 class="text-center">E-Survei Kampus UNSERA</h5>
                    <form method="POST" action="../controller/loginController.php">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" autocomplete="off" autofocus required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" name="login" class="btn btn-primary">Masuk <i class="fa-solid fa-right-to-bracket"></i></button>
                        </div>
                        <div class="d-grid mt-3">
                            <p>Belum punya akun?</p>
                            <a href="register.php" class="btn btn-success">Daftar <i class="fa-regular fa-address-card"></i></a>
                        </div>
                    </form>
                    <div class="d-grid mt-3">
                        <a href="admin/login.php"><p>Masuk Sebagai Admin?</p></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="bootstrap.min.js"></script>


