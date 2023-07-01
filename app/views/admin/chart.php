<?php
require "../../config/Connection.php";
$pageTitle = "admin";
require "../header.php";
$sql = "SELECT jawaban1, jawaban2, jawaban3, jawaban4, jawaban5, jawaban6, jawaban7, jawaban8 FROM survey_ds";
$resultDs = mysqli_query($conn, $sql);

$sql = "SELECT jawaban1, jawaban2, jawaban3, jawaban4, jawaban5, jawaban6, jawaban7, jawaban8 FROM survey_mhs";
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
<div class="container" style="text-align: center;">
    <h1 class="text-center">Survey Mahasiswa</h1>
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="chart-label">Pertanyaan 1</div>
                    <canvas id="chart1"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="chart-label">Pertanyaan 2</div>
                    <canvas id="chart2"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="chart-label">Pertanyaan 3</div>
                    <canvas id="chart3"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="chart-label">Pertanyaan 4</div>
                    <canvas id="chart4"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="chart-label">Pertanyaan 5</div>
                    <canvas id="chart5"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="chart-label">Pertanyaan 6</div>
                    <canvas id="chart6"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="chart-label">Pertanyaan 7</div>
                    <canvas id="chart7"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="chart-label">Pertanyaan 8</div>
                    <canvas id="chart8"></canvas>
                </div>
            </div>
        </div>
    </div>


    <h1 class="text-center">Survey Dosen</h1>
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="chart-label">Pertanyaan 1</div>
                    <canvas id="chart9"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="chart-label">Pertanyaan 2</div>
                    <canvas id="chart10"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="chart-label">Pertanyaan 3</div>
                    <canvas id="chart11"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="chart-label">Pertanyaan 4</div>
                    <canvas id="chart12"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="chart-label">Pertanyaan 5</div>
                    <canvas id="chart13"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="chart-label">Pertanyaan 6</div>
                    <canvas id="chart14"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="chart-label">Pertanyaan 7</div>
                    <canvas id="chart15"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="chart-label">Pertanyaan 8</div>
                    <canvas id="chart16"></canvas>
                </div>
            </div>
        </div>
    </div>
    <a href="admin.php" class="btn btn-primary mt-2">Kembali</a>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Query untuk mengambil data dari tabel survey_mhs
    var dataMhs = <?php echo json_encode($resultMhs->fetch_all(MYSQLI_ASSOC)); ?>;

    // Query untuk mengambil data dari tabel survey_ds
    var dataDs = <?php echo json_encode($resultDs->fetch_all(MYSQLI_ASSOC)); ?>;

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
    var jawabanDs = [
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

    // Menghitung jumlah jawaban untuk setiap pertanyaan dari survey dosen
    for (var i = 0; i < dataDs.length; i++) {
        for (var j = 1; j <= 8; j++) {
            var answer = parseInt(dataDs[i]['jawaban' + j]);
            jawabanDs[j - 1][answer - 1]++;
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

    // Inisialisasi chart untuk setiap pertanyaan dari survey mahasiswa
    for (var i = 0; i < dataMhsChart.length; i++) {
        var chartId = "chart" + (i + 1);
        var ctx = document.getElementById(chartId).getContext("2d");
        var myChart = new Chart(ctx, {
            type: "pie", // Menggunakan pie chart
            data: {
                labels: ["Kurang", "Baik", "Sangat Baik"],
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


    // Inisialisasi chart untuk setiap pertanyaan dari survey dosen
    for (var i = 0; i < dataDsChart.length; i++) {
        var chartId = "chart" + (i + 9); // Penomoran chart dimulai dari 9
        var ctx = document.getElementById(chartId).getContext("2d");
        var myChart = new Chart(ctx, {
            type: "pie", // Menggunakan pie chart
            data: {
                labels: ["Kurang", "Baik", "Sangat Baik"],
                datasets: [{
                    data: dataDsChart[i],
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

<?php

require "../footer.php";
