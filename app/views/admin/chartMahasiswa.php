<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}
$pageTitle = "Chart Mahasiswa";
$navName = "E-Survey Kampus Universitas Serang Raya";

require "../../config/Connection.php";
require "../navbar.php";

$queryMhs = "SELECT jawaban1, jawaban2, jawaban3, jawaban4, jawaban5, jawaban6, jawaban7, jawaban8 FROM survey_mhs";
$sqlMhs = "SELECT pertanyaan FROM pertanyaan_mhs";
$resultMhs = mysqli_query($conn, $queryMhs);
$pertnyaanMhs = mysqli_query($conn, $sqlMhs);
$rowMhs = mysqli_fetch_all($pertnyaanMhs, MYSQLI_ASSOC);
?>
<div class="container" style="text-align: center;">
    <div class="container">
        <h1 class="text-center nama-user">Survey Mahasiswa</h1>
        <div class="row">
            <?php for ($i = 0; $i < 8; $i++) {
                $pertanyaan = $rowMhs[$i]['pertanyaan'];
            ?>
                <div class="col-md-6 col-lg-3">
                    <div class="card mt-3">
                        <div class="card-body">
                            <p><?php echo $pertanyaan; ?></p>
                            <canvas id="chart<?php echo $i + 1; ?>"></canvas>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <a href="admin.php" class="btn btn-primary mt-2">Kembali</a>
</div>
<script>
    // Query untuk mengambil data dari tabel survey_mhs
    var dataMhs = <?php echo json_encode($resultMhs->fetch_all(MYSQLI_ASSOC)); ?>;

    // Inisialisasi array untuk menyimpan data jawaban
    var jawabanMhs = [
        [0, 0, 0],
        [0, 0, 0],
        [0, 0, 0],
        [0, 0, 0],
        [0, 0, 0],
        [0, 0, 0],
        [0, 0, 0],
        [0, 0, 0]
    ];
    
    // Menghitung jumlah jawaban untuk setiap pertanyaan dari survey mahasiswa
    for (var i = 0; i < dataMhs.length; i++) {
        for (var j = 1; j <= 8; j++) {
            var answer = parseInt(dataMhs[i]['jawaban' + j]);
            jawabanMhs[j - 1][answer - 1]++;
        }
    }

    // Buat array labels untuk chart
    var labels = [];
    for (var i = 1; i <= 8; i++) {
        labels.push("Pertanyaan " + i);
    }

    // Inisialisasi array data untuk chart
    var dataMhsChart = jawabanMhs;

    // Inisialisasi chart untuk setiap pertanyaan dari survey mahasiswa
    for (var i = 0; i < dataMhsChart.length; i++) {
        var chartId = "chart" + (i + 1);
        var ctx = document.getElementById(chartId).getContext("2d");
        var myChart = new Chart(ctx, {
            type: "pie", // Menggunakan pie chart
            data: {
                labels: ["Kurang", "Cukup", "Sangat Baik"],
                datasets: [{
                    data: dataMhsChart[i],
                    backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56"]
                }]
            },
            options: {
                maintainAspectRatio: false,
                responsive: false,
                legend: {
                    display: false
                }, // Menyembunyikan legenda
                width: 200, // Lebar chart
                height: 200 // Tinggi chart
            }
        });
    }
</script>
<?php require "../footer.php";
