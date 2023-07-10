<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['role'] !== 'admin') {
  header("Location: login.php");
  exit;
}
$pageTitle = "Chart";
$navName = "E-Survey Kampus Universitas Serang Raya";

require "../../config/Connection.php";
require "../navbar.php";

$queryDs = "SELECT jawaban1, jawaban2, jawaban3, jawaban4, jawaban5, jawaban6, jawaban7, jawaban8 FROM survey_ds";
$sqlDs = "SELECT pertanyaan FROM pertanyaan_ds";
$resultDs = mysqli_query($conn, $queryDs);
$pertnyaanDs = mysqli_query($conn, $sqlDs);
$rowDs = mysqli_fetch_all($pertnyaanDs, MYSQLI_ASSOC);
?>
<div class="container" style="text-align: center;">
  <h1 class="text-center nama-user">Survei Dosen</h1>
  <div class="row">
    <?php
    $n = 0;
    for ($i = 0; $i < 8; $i++) {
      $pertanyaan = $rowDs[$i]['pertanyaan'];
      $n++;
    ?>
      <div class="col-md-6 col-lg-3">
        <div class="card mt-3">
          <div class="card-body">
            <p><?php echo $n . ". " . $pertanyaan; ?></p>
            <canvas id="chart<?php echo $i + 9; ?>"></canvas>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
  <button class="btn btn-primary mt-1 tombol-pad" onclick="toggleDonut()">Ubah Chart</button>
  <a href="admin.php" class="btn btn-primary mt-1 tombol-pad">Kembali</a>
</div>
<script>
  // Query untuk mengambil data dari tabel survey_ds
  var dataDs = <?php echo json_encode($resultDs->fetch_all(MYSQLI_ASSOC)); ?>;
  var charts = [];

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

  var dataDsChart = jawabanDs;

  // Inisialisasi chart untuk setiap pertanyaan dari survey dosen
  for (var i = 0; i < dataDsChart.length; i++) {
    var chartId = "chart" + (i + 9); // Penomoran chart dimulai dari 9
    var ctx = document.getElementById(chartId).getContext("2d");
    var myChart = new Chart(ctx, {
      type: "pie", // Menggunakan pie chart
      data: {
        labels: ["Kurang", "Cukup", "Sangat Baik"],
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
