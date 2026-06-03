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
$dosen = $_SESSION['nama'];

$sql = "SELECT * FROM pertanyaan_ds";
$result = mysqli_query($conn, $sql);

$pageTitle = "Survei Dosen";
$navName = "E-Survei UNSERA";
require "../navbar.php";

$pertanyaan = [
    1 => "Seberapa puas Anda dengan dukungan yang diberikan oleh institusi terkait fasilitas dan sumber daya yang memfasilitasi kegiatan mengajar Anda?",
    2 => "Bagaimana penilaian Anda terhadap tingkat keefektifan metode pengajaran yang Anda gunakan dalam memfasilitasi pemahaman dan pembelajaran mahasiswa?",
    3 => "Seberapa baik Anda dalam memberikan umpan balik yang konstruktif kepada mahasiswa mengenai kinerja dan kemajuan akademik mereka?",
    4 => "Sejauh mana Anda melibatkan mahasiswa dalam proses pembelajaran, seperti diskusi kelas, tugas kelompok, atau proyek kolaboratif?",
    5 => "Bagaimana penilaian Anda terhadap kemampuan mahasiswa dalam mengaplikasikan pengetahuan yang mereka peroleh dalam konteks dunia nyata?",
    6 => "Seberapa baik Anda dalam memfasilitasi diskusi terbuka dan interaktif di kelas guna mendorong partisipasi aktif mahasiswa?",
    7 => "Bagaimana penilaian Anda terhadap kualitas bahan ajar yang Anda sediakan, seperti buku teks, materi kuliah, atau sumber referensi lainnya?",
    8 => "Sejauh mana Anda memberikan kesempatan bagi mahasiswa untuk mengembangkan keterampilan praktis yang relevan dengan bidang studi mereka?",
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
    <div class="container">
        <div class="survey-header-inner">
            <div class="survey-role-badge">Dosen</div>
            <h1 class="survey-welcome">Selamat datang, <?= htmlspecialchars($dosen); ?>.</h1>
            <p class="survey-welcome-sub">Isi survei berikut untuk membantu evaluasi kualitas akademik kampus.</p>
        </div>
    </div>
</div>

<div class="survey-body">
    <div class="container">
        <form action="../../controller/surveyControllerDs.php" method="post" id="surveyForm">
            <input type="hidden" name="nama" value="<?= htmlspecialchars($dosen); ?>">

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
                <div class="container d-flex align-items-center gap-3">
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
            url: '../../controller/surveyControllerDs.php',
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
