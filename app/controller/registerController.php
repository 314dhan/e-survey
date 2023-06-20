<?php
require_once __DIR__ . '/../config/connection.php';

if(isset($_POST['email']) && isset($_POST['nama']) && isset($_POST['password']) && isset($_POST['role'])){
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Memeriksa peran (role) dan menentukan tabel yang sesuai
    $table = '';
    $redirect_url = '';
    if($role === 'dosen'){
        $table = 'ds'; // Tabel dosen
        $redirect_url = '../views/dosen/dosen.php'; // Halaman dosen
    } elseif($role === 'mahasiswa'){
        $table = 'mhs'; // Tabel mahasiswa
        $redirect_url = '../views/mahasiswa/mahasiswa.php'; // Halaman mahasiswa
    }

    // Menghindari SQL injection menggunakan prepared statement
    $stmt = mysqli_prepare($conn, "INSERT INTO $table (email, nama, password) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sss", $email, $nama, $hashed_password);
    mysqli_stmt_execute($stmt);

    if(mysqli_stmt_affected_rows($stmt) > 0){
        // Registrasi berhasil, alihkan ke halaman yang sesuai
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $role;
        $_SESSION['nama'] = $nama;
        header("Location: $redirect_url");
        exit;
    } else {
        echo "Registrasi gagal!";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>
