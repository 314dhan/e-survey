<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "connection.php";
// Cek apakah pengguna sudah login menggunakan session
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    // Jika pengguna belum login, redirect ke halaman login
    header("Location: login.php");
    exit;
}

// Ambil data email pengguna dari session
$email = $_SESSION['email'];

// Lakukan query untuk mendapatkan 'username' dari tabel 'mhs' berdasarkan 'email'
$query = "SELECT username FROM mhs WHERE email = '$email'";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
} else {
    // Jika data pengguna tidak ditemukan, lakukan tindakan yang sesuai
    $error = "Data pengguna tidak ditemukan!";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Mahasiswa</title>
</head>
<body>
    <h4><a href="logout.php">Logout</a>
</h4>
    <h1>Selamat datang, <?php echo $username; ?>!</h1>
    <!-- Tampilkan data atau konten halaman lainnya -->
</body>
</html>
