<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

require "../../config/Connection.php";

$pageTitle = "Tabel Survei";
$navName = "E-Survei UNSERA";
require "../navbar.php";

$sql = "SELECT * FROM survey_ds";
$resultDs = mysqli_query($conn, $sql);

$sql = "SELECT * FROM survey_mhs";
$resultMhs = mysqli_query($conn, $sql);

function getJawabanTeks($nilai)
{
    switch ($nilai) {
        case 1: return "Sangat Kurang";
        case 2: return "Kurang";
        case 3: return "Cukup";
        case 4: return "Baik";
        case 5: return "Sangat Baik";
        default: return "—";
    }
}

function getBadgeClass($nilai)
{
    if ($nilai <= 1) return "ans-badge ans-badge-1";
    if ($nilai <= 2) return "ans-badge ans-badge-2";
    return "ans-badge ans-badge-3";
}
?>

<div class="admin-body">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h1 class="admin-page-title mb-1">Tabel Survei</h1>
                <p class="admin-page-sub mb-0">Seluruh data hasil survei dosen dan mahasiswa.</p>
            </div>
            <a href="admin.php" class="btn btn-outline-secondary btn-sm">
                <i class="fa-solid fa-arrow-left me-1"></i> Kembali
            </a>
        </div>

        <div class="mb-5">
            <h2 class="table-section-title">Survei Dosen</h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>P1</th>
                            <th>P2</th>
                            <th>P3</th>
                            <th>P4</th>
                            <th>P5</th>
                            <th>P6</th>
                            <th>P7</th>
                            <th>P8</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($resultDs)):
                        ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= htmlspecialchars($row['nama']); ?></td>
                            <?php for ($j = 1; $j <= 8; $j++): ?>
                            <td>
                                <span class="<?= getBadgeClass($row['jawaban'.$j]); ?>">
                                    <?= getJawabanTeks($row['jawaban'.$j]); ?>
                                </span>
                            </td>
                            <?php endfor; ?>
                        </tr>
                        <?php $no++; endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mb-4">
            <h2 class="table-section-title">Survei Mahasiswa</h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>P1</th>
                            <th>P2</th>
                            <th>P3</th>
                            <th>P4</th>
                            <th>P5</th>
                            <th>P6</th>
                            <th>P7</th>
                            <th>P8</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($resultMhs)):
                        ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= htmlspecialchars($row['nama']); ?></td>
                            <?php for ($j = 1; $j <= 8; $j++): ?>
                            <td>
                                <span class="<?= getBadgeClass($row['jawaban'.$j]); ?>">
                                    <?= getJawabanTeks($row['jawaban'.$j]); ?>
                                </span>
                            </td>
                            <?php endfor; ?>
                        </tr>
                        <?php $no++; endwhile; ?>
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
