<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

require "../../config/Connection.php";

$sqlDosen = "SELECT * FROM pertanyaan_ds";
$sqlMahasiswa = "SELECT * FROM pertanyaan_mhs";
$resultDosen = mysqli_query($conn, $sqlDosen);
$resultMahasiswa = mysqli_query($conn, $sqlMahasiswa);
$pageTitle = "Pertanyaan";
$navName = "E-Survey Kampus Universitas Serang Raya";

require "../navbar.php";
?>
<div class="container" style="text-align: center;">
    <h1 class="nama-user">Table Dosen</h2>
        <table class="table table-bordered table-striped">
            <tr>
                <th>No</th>
                <th>Pertanyaan</th>
                <th>Aksi</th>
            </tr>
            <?php
            if (mysqli_num_rows($resultDosen) > 0) {
                while ($row = mysqli_fetch_assoc($resultDosen)) {
                    $no = $row['no'];
                    $pertanyaan = $row['pertanyaan'];

                    echo '<tr>';
                    echo '<td>' . $no . '</td>';
                    echo '<td>' . $pertanyaan . '</td>';
                    echo '<td><a class="btn btn-primary" href="updateDs.php?pertanyaan=' . urlencode($pertanyaan) . '">Update</a></td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td colspan="2">Tidak ada data pertanyaan untuk dosen.</td>';
                echo '</tr>';
            }
            ?>
        </table>

        <h1 class="nama-user">Table Mahasiswa</h1>
        <table class="table table-bordered table-striped">
            <tr>
                <th>No</th>
                <th>Pertanyaan</th>
                <th>Aksi</th>
            </tr>
            <?php
            if (mysqli_num_rows($resultMahasiswa) > 0) {
                while ($row = mysqli_fetch_assoc($resultMahasiswa)) {
                    $no = $row['no'];
                    $pertanyaan = $row['pertanyaan'];

                    echo '<tr>';
                    echo '<td>' . $no . '</td>';
                    echo '<td>' . $pertanyaan . '</td>';
                    echo '<td><a class="btn btn-primary" href="updateMhs.php?pertanyaan=' . urlencode($pertanyaan) . '">Update</a></td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td colspan="2">Tidak ada data pertanyaan untuk mahasiswa.</td>';
                echo '</tr>';
            }
            ?>
        </table>
        <a href="admin.php" class="btn btn-primary">Kembali</a>
</div>

<?php require "../footer.php";
