<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$pageTitle = "Update";
$navName = "E-Survey Kampus Universitas Serang Raya";

require "../../config/Connection.php";
require "../navbar.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pertanyaan = $_POST['pertanyaan'];

    echo "Pertanyaan berhasil diperbarui!";
    echo '<a href="halaman_sebelumnya.php">Kembali</a>';
} else {
    $pertanyaan = $_GET['pertanyaan'];
?>
    <div class="container mt-3" style="text-align: center;">
        <h1 class="nama-user">Perbarui Pertanyaan Dosen</h1>

        <form method="POST" action="../../model/modelUpdateDs.php">
            <div class="mb-3">
                <label class="form-label nama-user" for="pertanyaan">Pertanyaan awal: </label>
                <input class="form-control" type="text" name="pertanyaan" value="<?= $pertanyaan; ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label nama-user" for="pertanyaanUpdate">Perbaharui</label>
                <input class="form-control" type="text" name="pertanyaanUpdate" autofocus>
            </div>
            <button type="submit" class="btn btn-primary">Update</button><br><br>
            <a href="pertanyaan.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
<?php
}
?>