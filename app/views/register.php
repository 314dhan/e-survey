<?php
$pageTitle = "Register";
require "header.php";
?>
    <h2>Register</h2>
    <form action="../controller/registerController.php" method="POST">
        <label for="email">Email:</label><br>
        <input type="email" name="email" required><br><br>
        <label for="nama">Nama:</label><br>
        <input type="text" name="nama" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" name="password" required><br><br>
        <select name="role" required>
            <option value="dosen">Dosen</option>
            <option value="mahasiswa">Mahasiswa</option>
        </select><br><br>
        <input type="submit" value="Register">
        <button><a href="login.php">Kembali</a></button>
    </form>
</body>
</html>
