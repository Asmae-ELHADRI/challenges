<?php 
include "../Authentification/config.php";
session_start();

$client_id = $pdo->query("select * from clients")->fetchAll();
?>

<h2>Liste des clients</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($client_id as $client): ?>
    <tr>
        <td><?= htmlspecialchars($client['id']) ?></td>
        <td><?= htmlspecialchars($client['nom']) ?></td>
        <td>
            <a href="edit_client.php?id=<?= $client['id'] ?>">Éditer</a> |
            <a href="delete_client.php?id=<?= $client['id'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?');">Supprimer</a>
        </td>
    </tr>
    <?php endforeach; ?>