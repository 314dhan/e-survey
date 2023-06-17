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
?>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="login-container">
                        <?php if(isset($error)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error; ?>
                            </div>
                        <?php } ?>
                    <h2 class="text-center">Form Login</h2>
                    <form method="POST" action="../controller/loginController.php">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" name="login" class="btn btn-primary">Login</button>
                        </div>
                        <div>
                            <h4><a href="register.php">Daftar?</a></h4>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="bootstrap.min.js"></script>


