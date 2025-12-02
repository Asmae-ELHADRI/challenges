<?php 

include "sidebar.php";

session_start();
?>

<div class="ml-64 p-10">
    <h1 class="text-3xl font-bold">Bienvenue <?= $_SESSION['username'] ?></h1>

    <?php if (isset($_COOKIE['last_user'])): ?>
        <p class="mt-3 text-gray-600">Dernière connexion : <?= $_COOKIE['last_user'] ?></p>
    <?php endif; ?>
</div>
<script src="https://cdn.tailwindcss.com"></script>
