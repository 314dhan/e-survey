<?php
require_once "connection.php";

// Cek apakah ada data login yang disubmit
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query untuk mendapatkan data pengguna berdasarkan email
    $query = "SELECT * FROM mhs WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    // Memeriksa apakah pengguna ditemukan dalam database
    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        $stored_password = $row['password'];

        // Memeriksa kecocokan password
        if($password === $stored_password){
            $namaMahasiswa = $row['nama'];
            $_SESSION['mahasiswa'] = $namaMahasiswa;

            // Jika password cocok, set session dan redirect ke halaman selamat datang
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;

            header("Location: mahasiswa.php");
            exit;
        } else {
            // Jika password tidak cocok, tampilkan pesan error
            $error = "Password salah!";
        }
    } else {
        // Jika email tidak ditemukan, tampilkan pesan error
        $error = "Email tidak terdaftar!";
    }
}
?>
