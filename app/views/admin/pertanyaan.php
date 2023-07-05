<?php
require "../../config/Connection.php";

// Query untuk mengambil data dari tabel pertanyaan_ds
$sqlDosen = "SELECT * FROM pertanyaan_ds";
$resultDosen = mysqli_query($conn, $sqlDosen);

// Query untuk mengambil data dari tabel pertanyaan_mhs
$sqlMahasiswa = "SELECT * FROM pertanyaan_mhs";
$resultMahasiswa = mysqli_query($conn, $sqlMahasiswa);
$pageTitle = "Pertanyaan";
require "../navbar.php";
?>
<div class="container" style="text-align: center;">
    <h2>Table Dosen</h2>
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
                echo '<td><a class="btn btn-primary" href="update.php"> update </a></td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="2">Tidak ada data pertanyaan untuk dosen.</td>';
            echo '</tr>';
        }
        ?>
    </table>

    <h2>Table Mahasiswa</h2>
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
                echo '<td><a class="btn btn-primary" href="update.php"> Update </a></td>';
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
