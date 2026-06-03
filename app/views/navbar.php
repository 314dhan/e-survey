<?php require "header.php"; ?>

<nav class="app-nav">
    <a class="app-nav-brand" href="#">
        <span class="app-nav-brand-dot"></span>
        <?= htmlspecialchars($navName); ?>
    </a>
    <a href="../../controller/logoutController.php" class="app-nav-logout">
        <i class="fa-solid fa-arrow-right-from-bracket"></i> Keluar
    </a>
</nav>
