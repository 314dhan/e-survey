<?php
require "../../config/Connection.php";

$sql = "SELECT * FROM survey_mhs";
$result = mysqli_query($conn, $sql);

// Cek apakah ada data yang ditemukan
if (mysqli_num_rows($result) > 0) {
    ?>
    <h2>Data Survey</h2>
    <table border="1">
        <tr>
            <th>ID Survey</th>
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
    <?php
    // Menampilkan data survey
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['no']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['jawaban1']; ?></td>
            <td><?php echo $row['jawaban2']; ?></td>
            <td><?php echo $row['jawaban3']; ?></td>
            <td><?php echo $row['jawaban4']; ?></td>
            <td><?php echo $row['jawaban5']; ?></td>
            <td><?php echo $row['jawaban6']; ?></td>
            <td><?php echo $row['jawaban7']; ?></td>
            <td><?php echo $row['jawaban8']; ?></td>
        </tr> 
        <?php
    }
    ?>
    </table>
    <?php
} else {
    echo "Tidak ada data survey.";
}