<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$pageTitle = "Update Pertanyaan Mahasiswa";
$navName = "E-Survei UNSERA";

require "../../config/Connection.php";
require "../navbar.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pertanyaan = htmlspecialchars($_POST['pertanyaan'] ?? '');
    echo "<p>Pertanyaan berhasil diperbarui.</p>";
    echo '<a href="pertanyaan.php" class="btn btn-primary btn-sm">Kembali ke Pertanyaan</a>';
} else {
    $pertanyaan = htmlspecialchars($_GET['pertanyaan'] ?? '');
?>
<div class="admin-body">
    <div class="container" style="max-width: 640px;">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h1 class="admin-page-title mb-1">Edit Pertanyaan Mahasiswa</h1>
                <p class="admin-page-sub mb-0">Perbarui teks pertanyaan survei mahasiswa.</p>
            </div>
            <a href="pertanyaan.php" class="btn btn-outline-secondary btn-sm">
                <i class="fa-solid fa-arrow-left me-1"></i> Kembali
            </a>
        </div>

        <div class="bg-white border rounded p-4" style="border-color: var(--color-border) !important; border-radius: var(--radius-md) !important;">
            <form method="POST" action="../../model/modelUpdateMhs.php">
                <div class="mb-3">
                    <label class="form-label" for="pertanyaan">Pertanyaan saat ini</label>
                    <input class="form-control" type="text" id="pertanyaan" name="pertanyaan"
                           value="<?= $pertanyaan; ?>" readonly
                           style="background-color: var(--color-surface); color: var(--color-muted);">
                </div>
                <div class="mb-4">
                    <label class="form-label" for="pertanyaanUpdate">Teks baru</label>
                    <input class="form-control" type="text" id="pertanyaanUpdate" name="pertanyaanUpdate"
                           placeholder="Masukkan pertanyaan baru" autofocus>
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-check me-1"></i> Simpan Perubahan
                    </button>
                    <a href="pertanyaan.php" class="btn btn-outline-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>

<?php require "../footer.php"; ?>
