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
$sqlDs = "SELECT pertanyaan FROM pertanyaan_ds ORDER BY no";
$resultDs = mysqli_query($conn, $queryDs);
$pertanyaanDs = mysqli_query($conn, $sqlDs);
$rowDs = mysqli_fetch_all($pertanyaanDs, MYSQLI_ASSOC);
$dataDs = $resultDs->fetch_all(MYSQLI_ASSOC);
?>

<div class="admin-body">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h1 class="admin-page-title mb-1">Chart Dosen</h1>
                <p class="admin-page-sub mb-0">Distribusi jawaban survei dosen per pertanyaan (skala 1–5).</p>
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-outline-secondary btn-sm" onclick="toggleStacked()">
                    <i class="fa-solid fa-layer-group me-1"></i> Stacked
                </button>
                <a href="admin.php" class="btn btn-outline-secondary btn-sm">
                    <i class="fa-solid fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>

        <div class="chart-grid">
            <?php for ($i = 0; $i < 8; $i++):
                $label = isset($rowDs[$i]['pertanyaan']) ? $rowDs[$i]['pertanyaan'] : 'Pertanyaan ' . ($i + 1);
            ?>
            <div class="chart-card">
                <p class="chart-card-title"><?= ($i + 1) . '. ' . htmlspecialchars($label); ?></p>
                <div class="chart-canvas-wrap">
                    <canvas id="chart<?= $i; ?>"></canvas>
                </div>
            </div>
            <?php endfor; ?>
        </div>

        <div class="pb-4">
            <a href="admin.php" class="btn btn-outline-secondary btn-sm">
                <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Dashboard
            </a>
        </div>
    </div>
</div>

<script>
var dataDs = <?php echo json_encode($dataDs); ?>;

var skala = ['Sangat Kurang', 'Kurang', 'Cukup', 'Baik', 'Sangat Baik'];
var colors = [
    'rgba(239,68,68,0.85)',
    'rgba(249,115,22,0.85)',
    'rgba(234,179,8,0.85)',
    'rgba(34,197,94,0.85)',
    'rgba(16,185,129,0.85)'
];
var borders = ['#ef4444','#f97316','#eab308','#22c55e','#10b981'];

var counts = [];
for (var i = 0; i < 8; i++) counts.push([0,0,0,0,0]);

for (var i = 0; i < dataDs.length; i++) {
    for (var j = 1; j <= 8; j++) {
        var val = parseInt(dataDs[i]['jawaban' + j]);
        if (val >= 1 && val <= 5) counts[j-1][val-1]++;
    }
}

var charts = [];
var isStacked = false;

for (var i = 0; i < 8; i++) {
    (function(idx) {
        var ctx = document.getElementById('chart' + idx).getContext('2d');
        var datasets = skala.map(function(lbl, s) {
            return {
                label: lbl,
                data: [counts[idx][s]],
                backgroundColor: colors[s],
                borderColor: borders[s],
                borderWidth: 1,
                borderRadius: 3
            };
        });

        var c = new Chart(ctx, {
            type: 'bar',
            data: { labels: [''], datasets: datasets },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: { font: { size: 10 }, padding: 6, boxWidth: 10 }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(ctx) {
                                var total = ctx.chart.data.datasets
                                    .reduce(function(s,d){ return s + (d.data[ctx.dataIndex]||0); }, 0);
                                var pct = total > 0 ? ((ctx.raw/total)*100).toFixed(1)+'%' : '0%';
                                return ctx.dataset.label + ': ' + ctx.raw + ' (' + pct + ')';
                            }
                        }
                    }
                },
                scales: {
                    x: { stacked: false, grid: { display: false }, ticks: { display: false } },
                    y: { stacked: false, beginAtZero: true, ticks: { stepSize: 1, font: { size: 11 } }, grid: { color: 'rgba(0,0,0,0.05)' } }
                }
            }
        });
        charts.push(c);
    })(i);
}

function toggleStacked() {
    isStacked = !isStacked;
    charts.forEach(function(c) {
        c.options.scales.x.stacked = isStacked;
        c.options.scales.y.stacked = isStacked;
        c.update();
    });
}
</script>

<?php require "../footer.php"; ?>
