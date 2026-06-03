<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$pageTitle = "Chart Mahasiswa";
$navName = "E-Survei UNSERA";

require "../../config/Connection.php";
require "../navbar.php";

$queryMhs = "SELECT jawaban1, jawaban2, jawaban3, jawaban4, jawaban5, jawaban6, jawaban7, jawaban8 FROM survey_mhs";
$sqlMhs = "SELECT pertanyaan FROM pertanyaan_mhs";
$resultMhs = mysqli_query($conn, $queryMhs);
$pertanyaanMhs = mysqli_query($conn, $sqlMhs);
$rowMhs = mysqli_fetch_all($pertanyaanMhs, MYSQLI_ASSOC);
?>

<div class="admin-body">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h1 class="admin-page-title mb-1">Chart Mahasiswa</h1>
                <p class="admin-page-sub mb-0">Distribusi jawaban survei dari mahasiswa per pertanyaan.</p>
            </div>
            <a href="admin.php" class="btn btn-outline-secondary btn-sm">
                <i class="fa-solid fa-arrow-left me-1"></i> Kembali
            </a>
        </div>

        <div class="chart-grid">
            <?php for ($i = 0; $i < 8; $i++):
                $pertanyaan = isset($rowMhs[$i]['pertanyaan']) ? $rowMhs[$i]['pertanyaan'] : 'Pertanyaan ' . ($i + 1);
            ?>
            <div class="chart-card">
                <p class="chart-card-title"><?= ($i + 1) . '. ' . htmlspecialchars($pertanyaan); ?></p>
                <canvas id="chart<?= $i + 1; ?>" width="220" height="220"></canvas>
                <p id="kesimpulan<?= $i + 1; ?>" style="font-size: var(--text-xs); color: var(--color-muted); text-align:center; margin:0;"></p>
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
var dataMhs = <?php echo json_encode($resultMhs->fetch_all(MYSQLI_ASSOC)); ?>;
var charts = [];

var jawabanMhs = [
    [0, 0, 0], [0, 0, 0], [0, 0, 0], [0, 0, 0],
    [0, 0, 0], [0, 0, 0], [0, 0, 0], [0, 0, 0]
];

for (var i = 0; i < dataMhs.length; i++) {
    for (var j = 1; j <= 8; j++) {
        var answer = parseInt(dataMhs[i]['jawaban' + j]);
        if (answer >= 1 && answer <= 3) {
            jawabanMhs[j - 1][answer - 1]++;
        }
    }
}

var chartColors = ['#ef4444', '#f59e0b', '#22c55e'];

for (var i = 0; i < 8; i++) {
    var ctx = document.getElementById('chart' + (i + 1)).getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Kurang', 'Cukup', 'Sangat Baik'],
            datasets: [{ data: jawabanMhs[i], backgroundColor: chartColors }]
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

    var total = jawabanMhs[i][0] + jawabanMhs[i][1] + jawabanMhs[i][2];
    var kesimpulanText = 'Belum ada data.';
    if (total > 0) {
        var maxIdx = jawabanMhs[i].indexOf(Math.max.apply(null, jawabanMhs[i]));
        var labels = ['Kurang', 'Cukup', 'Sangat Baik'];
        kesimpulanText = 'Mayoritas: ' + labels[maxIdx];
    }
    document.getElementById('kesimpulan' + (i + 1)).textContent = kesimpulanText;
}

function toggleDonut() {
    for (var i = 0; i < charts.length; i++) {
        charts[i].config.type = charts[i].config.type === 'pie' ? 'doughnut' : 'pie';
        charts[i].update();
    }
}
</script>

<?php require "../footer.php"; ?>
