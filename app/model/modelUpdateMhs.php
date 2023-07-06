<?php
require "../config/Connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pertanyaan = $_POST['pertanyaan'];
    $pertanyaanUpdate = $_POST['pertanyaanUpdate'];

    // Proses pembaruan data di database
    $query = "UPDATE pertanyaan_mhs SET pertanyaan = ? WHERE pertanyaan = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $pertanyaanUpdate, $pertanyaan);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../views/admin/pertanyaan.php");
        exit;
    } else {
        echo "Terjadi kesalahan saat memperbarui pertanyaan.";
    }

    mysqli_stmt_close($stmt);
}
