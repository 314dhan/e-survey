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
    <div class="mt-3">
        <h1 class="text-center nama-user">Survey Mahasiswa</h1>
        <div class="row">
            <?php
            $n = 0;
            for ($i = 0; $i < 8; $i++) {
                $pertanyaan = $rowMhs[$i]['pertanyaan'];
                $n++;
            ?>
                <div class="col-md-6 col-lg-3">
                    <div class="card mt-3">
                        <div class="card-body">
                            <p><?php echo $n . ". " . $pertanyaan; ?></p>
                            <canvas id="chart<?php echo $i + 1; ?>"></canvas>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <button class="btn btn-primary mt-2" onclick="toggleDonut()">Chart Donut</button><br>
    <a href="admin.php" class="btn btn-primary mt-2">Kembali</a>
</div>
<script>
    // Query untuk mengambil data dari tabel survey_mhs
    var dataMhs = <?php echo json_encode($resultMhs->fetch_all(MYSQLI_ASSOC)); ?>;
    var charts = [];

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
                width: 100, // Lebar chart
                height: 100 // Tinggi chart
            }
        });
        charts.push(myChart);
    }

    function toggleDonut() {
        for (var i = 0; i < charts.length; i++) { // Loop untuk setiap objek chart di array charts
            var chart = charts[i]; // Mendapatkan objek chart dari array
            if (chart.config.type === "pie") { // Jika tipe chart adalah pie
                chart.config.type = "doughnut"; // Ubah menjadi doughnut
            } else { // Jika tipe chart bukan pie
                chart.config.type = "pie"; // Ubah menjadi pie
            }
            chart.update(); // Perbarui chart
        }
    }
</script>
<?php require "../footer.php";
