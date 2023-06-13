<?php
require_once "connection.php";

// Cek apakah ada data login yang disubmit
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query untuk mendapatkan data mahasiswa berdasarkan email
    $queryMahasiswa = "SELECT * FROM mhs WHERE email = '$email'";
    $resultMahasiswa = mysqli_query($conn, $queryMahasiswa);

    // Query untuk mendapatkan data dosen berdasarkan email
    $queryDosen = "SELECT * FROM ds WHERE email = '$email'";
    $resultDosen = mysqli_query($conn, $queryDosen);

    // Memeriksa apakah pengguna ditemukan sebagai mahasiswa
    if(mysqli_num_rows($resultMahasiswa) === 1){
        $row = mysqli_fetch_assoc($resultMahasiswa);
        $stored_password = $row['password'];

        // Memeriksa kecocokan password
        if($password === $stored_password){
            // Jika password cocok, set session dan redirect ke halaman mahasiswa
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['role'] = 'mahasiswa';
            $_SESSION['nama'] = $row['nama'];

            header("Location: mahasiswa.php");
            exit;
        } else {
            // Jika password tidak cocok, tampilkan pesan error
            $error = "Password salah!";
            echo $error;
        }
    }
    // Memeriksa apakah pengguna ditemukan sebagai dosen
    elseif(mysqli_num_rows($resultDosen) === 1){
        $row = mysqli_fetch_assoc($resultDosen);
        $stored_password = $row['password'];

        // Memeriksa kecocokan password
        if($password === $stored_password){
            // Jika password cocok, set session dan redirect ke halaman dosen
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['role'] = 'dosen';
            $_SESSION['nama'] = $row['nama'];

            header("Location: dosen.php");
            exit;
        } else {
            // Jika password tidak cocok, tampilkan pesan error
            $error = "Password salah!";
            echo $error;
        }
    } else {
        // Jika email tidak ditemukan di kedua tabel, tampilkan pesan error
        $error = "Email tidak terdaftar!";
        echo $error;
    }
}
?>
