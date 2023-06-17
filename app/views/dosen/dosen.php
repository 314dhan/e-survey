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
$role = $_SESSION['role'];
$dosen = $_SESSION['nama'];

$pageTitle = "Dosen";
require "../header.php";
?>

<h4><a href="../../controller/logoutController.php">Logout</a></h4>
<h2>Selamat datang, <?php echo $dosen; ?>!</h2>
