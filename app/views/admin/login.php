<?php
error_reporting(E_ALL);
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    if ($_SESSION['role'] === 'admin') {
        header("Location: mahasiswa/mahasiswa.php");
        exit;
    }
}

$pageTitle = "Login Admin";
$navName = "E-Survey Kampus Universitas Serang Raya";
require "../header.php";
?>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="login-container">
                    <?php if (isset($error)) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php } ?>
                    <h2 class="text-center">Admin Login</h2>
                    <h5 class="text-center">E-Survei Kampus UNSERA</h5>
                    <form method="POST" action="../../controller/adminController.php">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username:</label>
                            <input type="username" id="username" name="username" class="form-control" autocomplete="off" autofocus required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" name="login" class="btn btn-primary">Masuk <i class="fa-solid fa-right-to-bracket"></i></button>
                        </div>
                        <div class="d-grid mt-3">
                            <a href="../login.php">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="bootstrap.min.js"></script>