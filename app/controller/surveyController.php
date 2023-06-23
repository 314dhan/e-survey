<?php
session_start();

require "../config/Connection.php";

if (isset($_POST['submit'])) {
    // Mendapatkan data dari form
    $nama = $_POST['nama'];
    $jawaban1 = $_POST['jawaban1'];
    $jawaban2 = $_POST['jawaban2'];
    $jawaban3 = $_POST['jawaban3'];
    $jawaban4 = $_POST['jawaban4'];
    $jawaban5 = $_POST['jawaban5'];
    $jawaban6 = $_POST['jawaban6'];
    $jawaban7 = $_POST['jawaban7'];
    $jawaban8 = $_POST['jawaban8'];

    // Menghindari serangan SQL Injection dengan menggunakan prepared statement
    $sql = "INSERT INTO survey_mhs (nama, jawaban1, jawaban2, jawaban3, jawaban4, jawaban5, jawaban6, jawaban7, jawaban8) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssssssss", $nama, $jawaban1, $jawaban2, $jawaban3, $jawaban4, $jawaban5, $jawaban6, $jawaban7, $jawaban8);

    // Eksekusi prepared statement
    if (mysqli_stmt_execute($stmt)) {
        // Jika penyimpanan sukses, redirect ke halaman mahasiswa.php
        header("Location: ../views/mahasiswa/mahasiswa.php");
        echo "berhasil?";
        exit;
    } else {
        // Jika terjadi kesalahan saat menyimpan, tampilkan pesan error
        echo "Error: " . mysqli_stmt_error($stmt);
    }

    // Menutup statement
    mysqli_stmt_close($stmt);
}
?>
