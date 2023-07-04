<?php define('BASE_URL', 'http://localhost/presentasi/'); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title><?= $pageTitle; ?></title>

    <!-- Import file CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/login.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Import file JavaScript Bootstrap (jika diperlukan) -->
    <script src="<?php echo BASE_URL; ?>public/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>