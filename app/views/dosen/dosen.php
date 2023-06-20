<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require "../../config/connection.php";

// Verifikasi cookie
if(isset($_COOKIE['user_role'])){
    $user_role = $_COOKIE['user_role'];
    
    if ($user_role === 'mahasiswa') {
        header("Location: ../views/mahasiswa/mahasiswa.php");
        exit;
    } elseif ($user_role === 'dosen') {
        header("Location: ../views/dosen/dosen.php");
        exit;
    }
}

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
require "../navbar.php";
?>

<h2>Selamat datang, <?php echo $dosen; ?>!</h2>
