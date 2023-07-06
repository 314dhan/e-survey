<?php
$pageTitle = "Update";

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
        <h1>Perbarui Pertanyaan Mahasiswa</h1>

        <form method="POST" action="../../model/modelUpdateMhs.php">
            <div class="mb3">
                <label class="form-label" for="pertanyaan">Pertanyaan awal: </label>
                <input class="form-control" type="text" name="pertanyaan" value="<?= $pertanyaan; ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label" for="pertanyaanUpdate">Perbaharui</label>
                <input class="form-control" type="text" name="pertanyaanUpdate">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="pertanyaan.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    <?php
}
?>