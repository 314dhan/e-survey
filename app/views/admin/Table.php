<?php
require "../../config/Connection.php";

$pageTitle = "Table";
require "../header.php";

$sql = "SELECT * FROM survey_ds";
$resultDs = mysqli_query($conn, $sql);

$sql = "SELECT * FROM survey_mhs";
$resultMhs = mysqli_query($conn, $sql);
?>
<div class='container' style='text-align: center;'>

    <h1>Data Survey Dosen</h1>
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
            echo "<td>" . $row['jawaban1'] . "</td>";
            echo "<td>" . $row['jawaban2'] . "</td>";
            echo "<td>" . $row['jawaban3'] . "</td>";
            echo "<td>" . $row['jawaban4'] . "</td>";
            echo "<td>" . $row['jawaban5'] . "</td>";
            echo "<td>" . $row['jawaban6'] . "</td>";
            echo "<td>" . $row['jawaban7'] . "</td>";
            echo "<td>" . $row['jawaban8'] . "</td>";
            echo "</tr>";
            $no++;
        }
        ?>
    </table>

    <h1>Data Suvey Mahasiswa</h1>
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
                echo "<td>" . $row['jawaban1'] . "</td>";
                echo "<td>" . $row['jawaban2'] . "</td>";
                echo "<td>" . $row['jawaban3'] . "</td>";
                echo "<td>" . $row['jawaban4'] . "</td>";
                echo "<td>" . $row['jawaban5'] . "</td>";
                echo "<td>" . $row['jawaban6'] . "</td>";
                echo "<td>" . $row['jawaban7'] . "</td>";
                echo "<td>" . $row['jawaban8'] . "</td>";
                echo "</tr>";
                $no++;
            }
        ?>
    </table>
    <a href="admin.php" class="btn btn-primary">Kembali</a>
</div>