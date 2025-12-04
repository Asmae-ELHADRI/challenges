<?php
include "../Authentification/config.php";

if (isset($_GET['id'])) {
    $client_id = $_GET['id'];

    // Supprimer le client de la BD
    $stmt = $pdo->prepare("DELETE FROM clients WHERE id=?");
    $stmt->execute([$id]);

    header("Location: clients.php?deleted=1");
    exit();
} else {
    header("Location: clients.php?error=1");
    exit();
}
