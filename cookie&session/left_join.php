<?php 
include "sidebar.php"; 
require "db.php";
?>

<div class="ml-64 p-10">
    <script src="https://cdn.tailwindcss.com"></script>
    <h2 class="text-3xl font-bold mb-5">LEFT JOIN</h2>

    <?php
    $sql = "SELECT clients.nom, commandes.produit
            FROM clients
            LEFT JOIN commandes
            ON clients.id = commandes.client_id";
    $stmt = $conn->query($sql);
    $data = $stmt->fetchAll();
    ?>

    <?php foreach ($data as $row): ?>
        <p class="p-3 bg-gray-100 rounded mb-2 shadow">
            <?= $row['nom'] ?> → <?= $row['produit'] ?? "Aucune commande" ?>
        </p>
    <?php endforeach; ?>
</div>
