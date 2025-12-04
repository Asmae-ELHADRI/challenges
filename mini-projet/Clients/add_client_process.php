<?php 
include "../Authentification/config.php";
session_start();

if (isset($_POST['ajouter'])){
    $nom = $_POST['nom'];

    $stmt = $pdo->prepare("INSERT INTO clients (nom) VALUES (?)");
    $stmt->execute([$nom]);

    header("Location: add_client.php?success=1");
    exit();
}