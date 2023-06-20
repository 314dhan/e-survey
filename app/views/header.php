<?php
// File: config.php

// Tentukan path dasar proyek
define('BASE_URL', 'http://localhost/presentasi/');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $pageTitle; ?></title>

    <!-- Import file CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/login.css">

    <!-- Import file JavaScript Bootstrap (jika diperlukan) -->
    <script src="<?php echo BASE_URL; ?>public/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>