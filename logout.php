<?php
session_start();

// Hancurkan semua data session
session_destroy();

// Redirect ke halaman login atau halaman lain yang sesuai
header("Location: login.php");
exit;
?>
