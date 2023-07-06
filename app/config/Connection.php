<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'kampus';

$conn = mysqli_connect($host, $username, $password, $database);

if(!$conn){
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
