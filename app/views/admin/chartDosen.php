<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$pageTitle = "Chart Dosen";
$navName = "E-Survei UNSERA";

require "../../config/Connection.php";
require "../navbar.php";

$queryDs = "SELECT jawaban1, jawaban2, jawaban3, jawaban4, jawaban5, jawaban6, jawaban7, jawaban8 FROM survey_ds";
$sqlDs = "SELECT pertanyaan FROM pertanyaan_ds";
$resultDs = mysqli_query($conn, $queryDs);
$pertanyaanDs = mysqli_query($conn, $sqlDs);
$rowDs = mysqli_fetch_all($pertanyaanDs, MYSQLI_ASSOC);
?>

<div class="admin-body">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h1 class="admin-page-title mb-1">Chart Dosen</h1>
                <p class="admin-page-sub mb-0">Distribusi jawaban survei dari dosen per pertanyaan.</p>
            </div>
            <a href="admin.php" class="btn btn-outline-secondary btn-sm">
                <i class="fa-solid fa-arrow-left me-1"></i> Kembali
            </a>
        </div>

        <div class="chart-grid">
            <?php
            for ($i = 0; $i < 8; $i++):
                $pertanyaan = isset($rowDs[$i]['pertanyaan']) ? $rowDs[$i]['pertanyaan'] : 'Pertanyaan ' . ($i + 1);
            ?>
            <div class="chart-card">
                <p class="chart-card-title"><?= ($i + 1) . '. ' . htmlspecialchars($pertanyaan); ?></p>
                <canvas id="chart<?= $i + 9; ?>" width="220" height="220"></canvas>
                <p id="kesimpulan<?= $i + 9; ?>" style="font-size: var(--text-xs); color: var(--color-muted); text-align:center; margin:0;"></p>
            </div>
            <?php endfor; ?>
        </div>

        <div class="mb-4">
            <button class="btn btn-outline-secondary btn-sm me-2" onclick="toggleDonut()">
                <i class="fa-solid fa-chart-donut me-1"></i> Ubah Tipe Chart
            </button>
            <a href="admin.php" class="btn btn-outline-secondary btn-sm">
                <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Dashboard
            </a>
        </div>
    </div>
</div>

<script>
var dataDs = <?php echo json_encode($resultDs->fetch_all(MYSQLI_ASSOC)); ?>;
var charts = [];

var jawabanDs = [
    [0, 0, 0], [0, 0, 0], [0, 0, 0], [0, 0, 0],
    [0, 0, 0], [0, 0, 0], [0, 0, 0], [0, 0, 0]
];

for (var i = 0; i < dataDs.length; i++) {
    for (var j = 1; j <= 8; j++) {
        var answer = parseInt(dataDs[i]['jawaban' + j]);
        if (answer >= 1 && answer <= 3) {
            jawabanDs[j - 1][answer - 1]++;
        }
    }
}

var chartColors = ['#ef4444', '#f59e0b', '#22c55e'];

for (var i = 0; i < 8; i++) {
    var ctx = document.getElementById('chart' + (i + 9)).getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Kurang', 'Cukup', 'Sangat Baik'],
            datasets: [{ data: jawabanDs[i], backgroundColor: chartColors }]
        },
        options: {
            responsive: false,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'bottom', labels: { font: { size: 11 } } },
                tooltip: {
                    callbacks: {
                        label: function (ctx) {
                            var total = ctx.dataset.data.reduce(function (a, b) { return a + b; }, 0);
                            var pct = total > 0 ? ((ctx.raw / total) * 100).toFixed(1) + '%' : '0%';
                            return ctx.label + ': ' + pct;
                        }
                    }
                }
            }
        }
    });
    charts.push(myChart);

    var total = jawabanDs[i][0] + jawabanDs[i][1] + jawabanDs[i][2];
    var kesimpulanText = 'Belum ada data.';
    if (total > 0) {
        var maxIdx = jawabanDs[i].indexOf(Math.max.apply(null, jawabanDs[i]));
        var labels = ['Kurang', 'Cukup', 'Sangat Baik'];
        kesimpulanText = 'Mayoritas: ' + labels[maxIdx];
    }
    document.getElementById('kesimpulan' + (i + 9)).textContent = kesimpulanText;
}

function toggleDonut() {
    for (var i = 0; i < charts.length; i++) {
        charts[i].config.type = charts[i].config.type === 'pie' ? 'doughnut' : 'pie';
        charts[i].update();
    }
}
</script>

<?php require "../footer.php"; ?>
