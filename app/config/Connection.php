<?php
// Konfigurasi koneksi ke database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'kampus';

// Membuat koneksi ke database
$conn = mysqli_connect($host, $username, $password, $database);

// Memeriksa koneksi
if(!$conn){
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
