<?php
session_start();

if(isset($_POST['submit'])){
    // Mendapatkan data dari form
    $jawaban1 = $_POST['jawaban1'];
    $jawaban2 = $_POST['jawaban2'];
    $jawaban3 = $_POST['jawaban3'];
    $jawaban4 = $_POST['jawaban4'];
    $jawaban5 = $_POST['jawaban5'];
    $jawaban6 = $_POST['jawaban6'];
    $jawaban7 = $_POST['jawaban7'];
    $jawaban8 = $_POST['jawaban8'];
    // $jawaban9 = $_POST['jawaban9'];
    // $jawaban10 = $_POST['jawaban10'];

    // Simpan jawaban ke dalam database atau file, sesuai kebutuhan aplikasi
    
    // Setelah menyimpan jawaban, Anda dapat melakukan redirect ke halaman lain
    // Misalnya, kembali ke halaman mahasiswa.php
    header("Location: mahasiswa.php");
    exit;
}
?>
