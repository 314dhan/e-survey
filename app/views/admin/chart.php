<?php
require "../../config/Connection.php";
$pageTitle = "admin";
require "../header.php";
$sql = "SELECT * FROM survey_ds";
$resultDs = mysqli_query($conn, $sql);

$sql = "SELECT * FROM survey_mhs";
$resultMhs = mysqli_query($conn, $sql);
?>
<style>
    .chart-container {
        display: inline-block;
        width: 300px;
        height: 300px;
        margin-right: 20px;
    }
</style>
<div class="chart-container">
    <canvas id="chart1"></canvas>
</div>
<div class="chart-container">
    <canvas id="chart2"></canvas>
</div>
<div class="chart-container">
    <canvas id="chart3"></canvas>
</div>
<div class="chart-container">
    <canvas id="chart4"></canvas>
</div>
<div class="chart-container">
    <canvas id="chart5"></canvas>
</div>
<div class="chart-container">
    <canvas id="chart6"></canvas>
</div>
<div class="chart-container">
    <canvas id="chart7"></canvas>
</div>
<div class="chart-container">
    <canvas id="chart8"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Query untuk mengambil data dari tabel survey_mhs
    var dataMhs = <?php echo json_encode($resultMhs->fetch_all(MYSQLI_ASSOC)); ?>;

    // Query untuk mengambil data dari tabel survey_ds
    var dataDs = <?php echo json_encode($resultDs->fetch_all(MYSQLI_ASSOC)); ?>;

    // Inisialisasi array untuk menyimpan data jawaban
    var jawabanMhs = [0, 0, 0, 0, 0, 0, 0, 0];
    var jawabanDs = [0, 0, 0, 0, 0, 0, 0, 0];

    // Menghitung jumlah jawaban untuk setiap pertanyaan dari survey mahasiswa
    for (var i = 0; i < dataMhs.length; i++) {
        for (var j = 1; j <= 8; j++) {
            jawabanMhs[j - 1] += parseInt(dataMhs[i]['jawaban' + j]);
        }
    }

    // Menghitung jumlah jawaban untuk setiap pertanyaan dari survey dosen
    for (var i = 0; i < dataDs.length; i++) {
        for (var j = 1; j <= 8; j++) {
            jawabanDs[j - 1] += parseInt(dataDs[i]['jawaban' + j]);
        }
    }

    // Buat array labels untuk chart
    var labels = [];
    for (var i = 1; i <= 8; i++) {
        labels.push("Pertanyaan " + i);
    }

    // Inisialisasi array data untuk chart
    var dataMhsChart = jawabanMhs;
    var dataDsChart = jawabanDs;

    var surveyDataMhs = {
        labels: labels,
        datasets: [{
            data: dataMhsChart,
            backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56", "#4BC0C0", "#9966FF", "#FF9F40", "#63FF84", "#C0C0C0"]
        }]
    };

    var surveyDataDs = {
        labels: labels,
        datasets: [{
            data: dataDsChart,
            backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56", "#4BC0C0", "#9966FF", "#FF9F40", "#63FF84", "#C0C0C0"]
        }]
    };

    // Inisialisasi chart untuk setiap pertanyaan dari survey mahasiswa
    surveyDataMhs.labels.forEach(function (question, index) {
        var chartId = "chart" + (index + 1);
        var ctx = document.getElementById(chartId).getContext("2d");
        var myChart = new Chart(ctx, {
            type: "pie", // Menggunakan pie chart
            data: {
                labels: [question],
                datasets: surveyDataMhs.datasets
            },
            options: {
                maintainAspectRatio: false,
                responsive: false,
                legend: { display: false }, // Menyembunyikan legenda
                width: 200, // Lebar chart
                height: 200 // Tinggi chart
            }
        });
    });

    // Inisialisasi chart untuk setiap pertanyaan dari survey dosen
    surveyDataDs.labels.forEach(function (question, index) {
        var chartId = "chart" + (index + 1);
        var ctx = document.getElementById(chartId).getContext("2d");
        var myChart = new Chart(ctx, {
            type: "pie", // Menggunakan pie chart
            data: {
                labels: [question],
                datasets: surveyDataDs.datasets
            },
            options: {
                maintainAspectRatio: false,
                responsive: false,
                legend: { display: false }, // Menyembunyikan legenda
                width: 200, // Lebar chart
                height: 200 // Tinggi chart
            }
        });
    });
</script>
<?php require "../footer.php";
