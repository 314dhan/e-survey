<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "../../../config/connection.php";
// Cek apakah pengguna sudah login menggunakan session
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    // Jika pengguna belum login, redirect ke halaman login
    header("Location: login.php");
    exit;
}

// Ambil data nama dosen dari session
$role = $_SESSION['role'];
$nama = $_SESSION['nama'];


?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Mahasiswa</title>
</head>
<body>
    <h4><a href="../../controller/logoutController.php">Logout</a></h4>
    
    <h1>Selamat datang, <?php echo $nama; ?>!</h1>
    <!-- Tampilkan data atau konten halaman lainnya -->
</body>
</html>
