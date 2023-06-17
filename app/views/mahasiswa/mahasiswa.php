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

$pageTitle = "Survei Mahasiswa";
require "../header.php";
?>

    <h4><a href="../../controller/logoutController.php">Logout</a></h4>
    
    <h1>Selamat datang, <?php echo $nama; ?>!</h1>
    
    <h1>Survei Mahasiswa</h1>

    <h3>Pertanyaan Survei</h3>
    <form action="survey_process.php" method="post">

        <p>1. Seberapa puas Anda dengan fasilitas kampus?</p>
        <input type="radio" name="q1" value="1"> Sangat tidak puas
        <input type="radio" name="q1" value="2"> Tidak puas
        <input type="radio" name="q1" value="3"> Netral
        <input type="radio" name="q1" value="4"> Puas
        <input type="radio" name="q1" value="5"> Sangat puas

        <p>2. Seberapa puas Anda dengan fasilitas kampus?</p>
        <input type="radio" name="q1" value="1"> Sangat tidak puas
        <input type="radio" name="q1" value="2"> Tidak puas
        <input type="radio" name="q1" value="3"> Netral
        <input type="radio" name="q1" value="4"> Puas
        <input type="radio" name="q1" value="5"> Sangat puas

        <p>3. Seberapa puas Anda dengan fasilitas kampus?</p>
        <input type="radio" name="q1" value="1"> Sangat tidak puas
        <input type="radio" name="q1" value="2"> Tidak puas
        <input type="radio" name="q1" value="3"> Netral
        <input type="radio" name="q1" value="4"> Puas
        <input type="radio" name="q1" value="5"> Sangat puas

        <p>4. Seberapa puas Anda dengan fasilitas kampus?</p>
        <input type="radio" name="q1" value="1"> Sangat tidak puas
        <input type="radio" name="q1" value="2"> Tidak puas
        <input type="radio" name="q1" value="3"> Netral
        <input type="radio" name="q1" value="4"> Puas
        <input type="radio" name="q1" value="5"> Sangat puas

        <p>5. Seberapa puas Anda dengan fasilitas kampus?</p>
        <input type="radio" name="q1" value="1"> Sangat tidak puas
        <input type="radio" name="q1" value="2"> Tidak puas
        <input type="radio" name="q1" value="3"> Netral
        <input type="radio" name="q1" value="4"> Puas
        <input type="radio" name="q1" value="5"> Sangat puas
        <br><br>

        <input type="submit" value="Kirim Survei">
    </form>

