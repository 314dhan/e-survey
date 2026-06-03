<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require "../../config/connection.php";

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../login.php"); exit;
}

$dosen = $_SESSION['nama'];

$pageTitle = "Survei Dosen";
$navName   = "E-Survei UNSERA";
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

$total = count($pertanyaan);
?>

<div class="survey-header">
    <div class="page-wrap-wide">
        <div class="survey-role-tag">Dosen</div>
        <h1 class="survey-header-name">Selamat datang, <?= htmlspecialchars($dosen); ?>.</h1>
        <p class="survey-header-desc">Isi survei berikut untuk membantu evaluasi kualitas akademik kampus.</p>
        <p class="survey-header-meta"><?= $total; ?> pertanyaan &middot; Skala 1–5</p>
    </div>
</div>

<div class="survey-body">
    <div class="page-wrap-wide">
        <form action="../../controller/surveyControllerDs.php" method="post" id="surveyForm">
            <input type="hidden" name="nama" value="<?= htmlspecialchars($dosen); ?>">

            <div class="survey-q-list">
                <?php foreach ($pertanyaan as $no => $teks): ?>
                <div class="survey-q" id="sq-<?= $no; ?>">
                    <div class="survey-q-num">Pertanyaan <?= str_pad($no, 2, '0', STR_PAD_LEFT); ?></div>
                    <p class="survey-q-text"><?= htmlspecialchars($teks); ?></p>

                    <div class="survey-scale-wrap">
                        <div class="survey-scale" role="radiogroup" aria-label="Jawaban pertanyaan <?= $no; ?>">
                            <?php for ($v = 1; $v <= 5; $v++): ?>
                            <div class="scale-opt">
                                <input type="radio"
                                       name="jawaban<?= $no; ?>"
                                       id="q<?= $no; ?>v<?= $v; ?>"
                                       value="<?= $v; ?>"
                                       required
                                       onchange="markAnswered(<?= $no; ?>)">
                                <label class="scale-dot" for="q<?= $no; ?>v<?= $v; ?>" title="<?= $v; ?>">
                                    <span class="scale-dot-val"><?= $v; ?></span>
                                </label>
                                <span class="scale-dot-lbl">
                                    <?php
                                    $labels = [1=>'Sangat Kurang', 2=>'Kurang', 3=>'Cukup', 4=>'Baik', 5=>'Sangat Baik'];
                                    if ($v === 1 || $v === 5) echo htmlspecialchars($labels[$v]);
                                    ?>
                                </span>
                            </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="survey-submit-bar">
                <div class="page-wrap-wide">
                    <div class="survey-submit-inner">
                        <button type="submit" class="btn btn-success btn-lg">
                            Kirim Survei <i class="fa-solid fa-paper-plane ms-1"></i>
                        </button>
                        <span class="survey-submit-note">Jawaban tidak dapat diubah setelah dikirim.</span>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
function markAnswered(no) {
    var el = document.getElementById('sq-' + no);
    if (el) el.classList.add('is-answered');
}

$(document).ready(function () {
    $('#surveyForm').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: '../../controller/surveyControllerDs.php',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (r) {
                if (r.status === 'success') {
                    Swal.fire({ icon: 'success', title: 'Survei Terkirim', text: 'Terima kasih atas partisipasi Anda!', confirmButtonColor: 'oklch(0.47 0.155 152)' })
                        .then(function () { window.location.href = '../../controller/logoutController.php'; });
                } else {
                    Swal.fire({ icon: 'error', title: 'Gagal Mengirim', text: r.message, confirmButtonColor: 'oklch(0.47 0.155 152)' });
                }
            },
            error: function () {
                Swal.fire({ icon: 'error', title: 'Terjadi Kesalahan', text: 'Pastikan semua pertanyaan telah dijawab.', confirmButtonColor: 'oklch(0.47 0.155 152)' });
            }
        });
    });
});
</script>

<?php require "../footer.php"; ?>
