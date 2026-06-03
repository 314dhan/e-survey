<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

require "../../config/Connection.php";

$sqlDosen = "SELECT * FROM pertanyaan_ds";
$sqlMahasiswa = "SELECT * FROM pertanyaan_mhs";
$resultDosen = mysqli_query($conn, $sqlDosen);
$resultMahasiswa = mysqli_query($conn, $sqlMahasiswa);

$pageTitle = "Pertanyaan";
$navName = "E-Survei UNSERA";
require "../navbar.php";
?>

<div class="admin-body">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h1 class="admin-page-title mb-1">Kelola Pertanyaan</h1>
                <p class="admin-page-sub mb-0">Daftar dan update pertanyaan survei dosen dan mahasiswa.</p>
            </div>
            <a href="admin.php" class="btn btn-outline-secondary btn-sm">
                <i class="fa-solid fa-arrow-left me-1"></i> Kembali
            </a>
        </div>

        <div class="mb-5">
            <h2 class="table-section-title">Pertanyaan Dosen</h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width:48px">No</th>
                            <th>Pertanyaan</th>
                            <th style="width:100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($resultDosen) > 0): ?>
                            <?php while ($row = mysqli_fetch_assoc($resultDosen)): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['no']); ?></td>
                                <td><?= htmlspecialchars($row['pertanyaan']); ?></td>
                                <td>
                                    <a class="btn btn-primary btn-sm"
                                       href="updateDs.php?pertanyaan=<?= urlencode($row['pertanyaan']); ?>">
                                        <i class="fa-solid fa-pen me-1"></i> Update
                                    </a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="text-center" style="color: var(--color-muted); padding: 2rem;">
                                    Belum ada pertanyaan untuk dosen.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mb-4">
            <h2 class="table-section-title">Pertanyaan Mahasiswa</h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width:48px">No</th>
                            <th>Pertanyaan</th>
                            <th style="width:100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($resultMahasiswa) > 0): ?>
                            <?php while ($row = mysqli_fetch_assoc($resultMahasiswa)): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['no']); ?></td>
                                <td><?= htmlspecialchars($row['pertanyaan']); ?></td>
                                <td>
                                    <a class="btn btn-primary btn-sm"
                                       href="updateMhs.php?pertanyaan=<?= urlencode($row['pertanyaan']); ?>">
                                        <i class="fa-solid fa-pen me-1"></i> Update
                                    </a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="text-center" style="color: var(--color-muted); padding: 2rem;">
                                    Belum ada pertanyaan untuk mahasiswa.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="pb-3">
            <a href="admin.php" class="btn btn-outline-secondary btn-sm">
                <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Dashboard
            </a>
        </div>
    </div>
</div>

<?php require "../footer.php"; ?>
