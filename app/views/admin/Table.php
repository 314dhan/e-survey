<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

require "../../config/Connection.php";

$pageTitle = "Table";
$navName = "E-Survey Kampus Universitas Serang Raya";
require "../navbar.php";

$sql = "SELECT * FROM survey_ds";
$resultDs = mysqli_query($conn, $sql);

$sql = "SELECT * FROM survey_mhs";
$resultMhs = mysqli_query($conn, $sql);
function getJawabanTeks($nilai)
{
    switch ($nilai) {
        case 1:
            return "Kurang";
        case 2:
            return "Baik";
        case 3:
            return "Sangat Baik";
        default:
            return "tidak ada";
    }
}
?>
<div class='container' style='text-align: center;'>

    <h2>Data Survey Dosen</h2>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jawaban 1</th>
                <th>Jawaban 2</th>
                <th>Jawaban 3</th>
                <th>Jawaban 4</th>
                <th>Jawaban 5</th>
                <th>Jawaban 6</th>
                <th>Jawaban 7</th>
                <th>Jawaban 8</th>
            </tr>
        </thead>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($resultDs)) {
            echo "<tr>";
            echo "<td>$no</td>";
            echo "<td>" . $row['nama'] . "</td>";
            echo "<td>" . getJawabanTeks($row['jawaban1']) . "</td>";
            echo "<td>" . getJawabanTeks($row['jawaban2']) . "</td>";
            echo "<td>" . getJawabanTeks($row['jawaban3']) . "</td>";
            echo "<td>" . getJawabanTeks($row['jawaban4']) . "</td>";
            echo "<td>" . getJawabanTeks($row['jawaban5']) . "</td>";
            echo "<td>" . getJawabanTeks($row['jawaban6']) . "</td>";
            echo "<td>" . getJawabanTeks($row['jawaban7']) . "</td>";
            echo "<td>" . getJawabanTeks($row['jawaban8']) . "</td>";
            echo "</tr>";
            $no++;
        }
        ?>
    </table>

    <h1 class="nama-user">Data Survei Mahasiswa</h1>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jawaban 1</th>
                <th>Jawaban 2</th>
                <th>Jawaban 3</th>
                <th>Jawaban 4</th>
                <th>Jawaban 5</th>
                <th>Jawaban 6</th>
                <th>Jawaban 7</th>
                <th>Jawaban 8</th>
            </tr>
        </thead>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($resultMhs)) {
            echo "<tr>";
            echo "<td>$no</td>";
            echo "<td>" . $row['nama'] . "</td>";
            echo "<td>" . getJawabanTeks($row['jawaban1']) . "</td>";
            echo "<td>" . getJawabanTeks($row['jawaban2']) . "</td>";
            echo "<td>" . getJawabanTeks($row['jawaban3']) . "</td>";
            echo "<td>" . getJawabanTeks($row['jawaban4']) . "</td>";
            echo "<td>" . getJawabanTeks($row['jawaban5']) . "</td>";
            echo "<td>" . getJawabanTeks($row['jawaban6']) . "</td>";
            echo "<td>" . getJawabanTeks($row['jawaban7']) . "</td>";
            echo "<td>" . getJawabanTeks($row['jawaban8']) . "</td>";
            echo "</tr>";
            $no++;
        }
        ?>
    </table>
    <a href="admin.php" class="btn btn-primary tombol-pad">Kembali</a>
</div>
<?php require "../footer.php";
