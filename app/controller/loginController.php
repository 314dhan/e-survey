<?php
require_once __DIR__ . '/../config/connection.php';

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $queryMahasiswa = "SELECT * FROM mhs WHERE email = ?";
    $stmtMahasiswa = mysqli_prepare($conn, $queryMahasiswa);
    mysqli_stmt_bind_param($stmtMahasiswa, "s", $email);
    mysqli_stmt_execute($stmtMahasiswa);
    $resultMahasiswa = mysqli_stmt_get_result($stmtMahasiswa);
    
    $queryDosen = "SELECT * FROM ds WHERE email = ?";
    $stmtDosen = mysqli_prepare($conn, $queryDosen);
    mysqli_stmt_bind_param($stmtDosen, "s", $email);
    mysqli_stmt_execute($stmtDosen);
    $resultDosen = mysqli_stmt_get_result($stmtDosen);

    if(mysqli_num_rows($resultMahasiswa) === 1){
        $row = mysqli_fetch_assoc($resultMahasiswa);
        $stored_password = $row['password'];

        // Memeriksa kecocokan password
        if(password_verify($password, $stored_password)){
            // Jika password cocok, set session dan redirect ke halaman mahasiswa
            setcookie("user_role", $_SESSION['role'], time() + (86400 * 30), "/"); // Cookie berlaku selama 30 hari
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['role'] = 'mahasiswa';
            $_SESSION['nama'] = $row['nama'];

            header("Location: ../views/mahasiswa/mahasiswa.php");
            exit;
        } else {
            $error = "Password salah!";
            echo $error;
        }
    }
    // Memeriksa apakah pengguna ditemukan sebagai dosen
    elseif(mysqli_num_rows($resultDosen) === 1){
        $row = mysqli_fetch_assoc($resultDosen);
        $stored_password = $row['password'];

        if(password_verify($password, $stored_password)){
            setcookie("user_role", $_SESSION['role'], time() + (86400 * 30), "/"); // Cookie berlaku selama 30 hari
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['role'] = 'dosen';
            $_SESSION['nama'] = $row['nama'];

            header("Location: ../views/dosen/dosen.php");
            exit;
        } else {
            $error = "Password salah!";
            echo $error;
        }
    } else {
        $error = "Email tidak terdaftar!";
        echo $error;
    }
}
