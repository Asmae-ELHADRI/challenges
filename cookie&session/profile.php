<?php 
session_start();
include "sidebar.php"; 
?>

<div class="ml-64 p-10">
    <script src="https://cdn.tailwindcss.com"></script>
    <h2 class="text-3xl font-bold">Profil</h2>

    <p class="mt-3 text-lg">
        Nom d'utilisateur : <span class="font-semibold"><?= $_SESSION['username'] ?></span>
    </p>

    <?php if (isset($_COOKIE['last_user'])): ?>
        <p class="mt-2 text-gray-600">Dernière connexion : <?= $_COOKIE['last_user'] ?></p>
    <?php endif; ?>
</div>
