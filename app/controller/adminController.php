<?php
require_once __DIR__ . '/../config/connection.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $queryAdmin = "SELECT * FROM admin WHERE username = ?";
    $stmtAdmin = mysqli_prepare($conn, $queryAdmin);
    mysqli_stmt_bind_param($stmtAdmin, "s", $username);
    mysqli_stmt_execute($stmtAdmin);
    $resultAdmin = mysqli_stmt_get_result($stmtAdmin);

    if(mysqli_num_rows($resultAdmin) === 1){
        $row = mysqli_fetch_assoc($resultAdmin);
        $stored_password = $row['password'];

        // Memeriksa kecocokan password
        if($password === $stored_password){
            setcookie("user_role", $_SESSION['role'], time() + (86400 * 30), "/");
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'admin';
            $_SESSION['nama'] = $row['nama'];

            header("Location: ../views/admin/admin.php");
            exit;
        } else {
            $error = "Password salah!";
            echo "<script>
            alert('$error');
            history.back();
            </script>";
        }
    }else{
        $error = "Username salah!";
            echo "<script>
            alert('$error');
            history.back();
            </script>";
    }
}