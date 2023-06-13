<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Cek apakah pengguna sudah login menggunakan session
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    // Jika pengguna belum login, redirect ke halaman login
    header("Location: login.php");
    exit;
}

// Ambil data nama dosen dari session
$dosen = $_SESSION['dosen'];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Dosen</title>
</head>
<body>
    <h2>Selamat datang, <?php echo $dosen; ?>!</h2>
    <!-- Tampilkan data atau konten halaman lainnya -->
</body>
</html>