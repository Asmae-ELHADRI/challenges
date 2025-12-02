<?php
$host = "localhost";
$dbname = "mini_join_pdo";
$username = "root";
$password = "root"; 


try {
    $conn = new PDO("mysql:host=localhost;dbname=mini_join_pdo;charset=utf8", "root", "root");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $e) {
    die("Erreur : " . $e->getMessage());
}
?>

