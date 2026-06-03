<?php
require "header.php";
?>

<nav class="navbar">
    <div class="container-fluid px-4">
        <a class="navbar-brand" href="#">
            <i class="fa-solid fa-chart-simple me-2" style="opacity:0.85"></i><?= htmlspecialchars($navName); ?>
        </a>
        <a href="../../controller/logoutController.php" class="logout-btn">
            <i class="fa-solid fa-arrow-right-from-bracket"></i> Keluar
        </a>
    </div>
</nav>
