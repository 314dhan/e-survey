<?php
$pageTitle = "Register";
require "header.php";
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="login-container">
                <h2 class="text-center">Form Daftar</h2>
                <h5 class="text-center">E-Survei Kampus UNSERA</h5>
                <form action="../controller/registerController.php" method="POST">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" autofocus required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Role:</label>
                        <select class="form-control" name="role" required>
                            <option value="dosen">Dosen</option>
                            <option value="mahasiswa">Mahasiswa</option>
                        </select>
                    </div>
                    <div class="d-grid mt-3">
                        <button type="submit" name="register" class="btn btn-primary">Daftar <i class="fa-solid fa-id-card"></i></button>
                    </div>
                    <div class="d-grid mt-3">
                        <p>Sudah punya akun?</p>
                        <a href="login.php" class="btn btn-secondary">Kembali <i class="fa-regular fa-circle-left"></i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>

</html>