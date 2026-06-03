<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require "../../config/connection.php";

if (isset($_COOKIE['user_role'])) {
    $user_role = $_COOKIE['user_role'];
    if ($user_role === 'mahasiswa') {
        header("Location: ../views/mahasiswa/mahasiswa.php");
        exit;
    } elseif ($user_role === 'dosen') {
        header("Location: ../views/dosen/dosen.php");
        exit;
    }
}

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

$role = $_SESSION['role'];
$nama = $_SESSION['nama'];

$sql = "SELECT * FROM pertanyaan_mhs";
$result = mysqli_query($conn, $sql);

$pageTitle = "Survei Mahasiswa";
$navName = "E-Survei UNSERA";
require "../navbar.php";

$pertanyaan = [
    1 => "Seberapa puas Anda dengan fasilitas kampus?",
    2 => "Bagaimana penilaian Anda terhadap kualitas pengajaran yang diberikan oleh dosen di kampus ini?",
    3 => "Sejauh mana kampus ini menyediakan fasilitas yang memadai untuk mendukung kegiatan belajar-mengajar?",
    4 => "Bagaimana tingkat kepuasan Anda terhadap layanan administrasi dan pelayanan mahasiswa di kampus ini?",
    5 => "Seberapa efektif sistem penilaian dan evaluasi di kampus ini dalam mengukur kemajuan dan pencapaian mahasiswa?",
    6 => "Seberapa baik kampus ini memberikan kesempatan bagi mahasiswa untuk mengembangkan potensi dan minat di luar kegiatan akademik?",
    7 => "Bagaimana penilaian Anda terhadap kualitas fasilitas perpustakaan yang tersedia di kampus ini?",
    8 => "Seberapa efektif kampus ini dalam memberikan dukungan dan bimbingan karier bagi mahasiswa?",
];

$skala = [
    1 => ["label" => "Sangat Kurang", "short" => "SK"],
    2 => ["label" => "Kurang",        "short" => "K"],
    3 => ["label" => "Cukup",         "short" => "C"],
    4 => ["label" => "Baik",          "short" => "B"],
    5 => ["label" => "Sangat Baik",   "short" => "SB"],
];
?>

<div class="survey-header">
    <div class="container-fluid px-4">
        <div class="survey-header-inner">
            <div class="survey-role-badge">Mahasiswa</div>
            <h1 class="survey-welcome">Selamat datang, <?= htmlspecialchars($nama); ?>.</h1>
            <p class="survey-welcome-sub">Isi survei berikut untuk membantu kampus meningkatkan kualitas layanan.</p>
        </div>
    </div>
</div>

<div class="survey-body">
    <div class="container-fluid px-4" style="max-width:1200px;margin:0 auto;">
        <form action="../../controller/surveyControllerMhs.php" method="post" id="surveyForm">
            <input type="hidden" name="nama" value="<?= htmlspecialchars($nama); ?>">

            <p class="survey-section-title">Pertanyaan Survei</p>

            <?php foreach ($pertanyaan as $no => $teks): ?>
            <div class="survey-q">
                <div class="survey-q-num">Pertanyaan <?= $no; ?></div>
                <p class="survey-q-text"><?= htmlspecialchars($teks); ?></p>
                <div class="survey-scale">
                    <?php foreach ($skala as $val => $info): ?>
                    <div class="scale-opt">
                        <input type="radio" name="jawaban<?= $no; ?>" value="<?= $val; ?>"
                               id="q<?= $no; ?>v<?= $val; ?>" required>
                        <label class="scale-lbl" for="q<?= $no; ?>v<?= $val; ?>">
                            <span class="sv"><?= $val; ?></span>
                            <span class="st"><?= htmlspecialchars($info['label']); ?></span>
                        </label>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endforeach; ?>

            <div class="survey-submit-bar">
                <div class="container-fluid px-4 d-flex align-items-center gap-3" style="max-width:1200px;margin:0 auto;">
                    <button type="submit" class="btn btn-success px-5">
                        Kirim Survei <i class="fa-solid fa-paper-plane ms-1"></i>
                    </button>
                    <span class="text-muted" style="font-size: var(--text-sm);">Jawaban tidak dapat diubah setelah dikirim.</span>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
$(document).ready(function () {
    $('#surveyForm').submit(function (event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: '../../controller/surveyControllerMhs.php',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Survei Terkirim',
                        text: 'Terima kasih atas partisipasi Anda!',
                        confirmButtonColor: 'oklch(0.47 0.155 152)'
                    }).then(function () {
                        window.location.href = '../../controller/logoutController.php';
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal Mengirim',
                        text: response.message,
                        confirmButtonColor: 'oklch(0.47 0.155 152)'
                    });
                }
            },
            error: function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    text: 'Harap pastikan semua pertanyaan telah dijawab.',
                    confirmButtonColor: 'oklch(0.47 0.155 152)'
                });
            }
        });
    });
});
</script>

<?php require "../footer.php"; ?>
