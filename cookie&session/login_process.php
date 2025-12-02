<?php
session_start();
include "db.php";

$user = $_POST["username"];
$pass = $_POST["password"];

// Vérification simple
$stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
$stmt->execute([$user, $pass]);
$found = $stmt->fetch();

if ($found) {
    $_SESSION["username"] = $user;

    // COOKIE 1h
    setcookie("last_user", $user, time() + 3600, "/");

    header("Location: dashboard.php");
    exit;
} else {
    $_SESSION["error"] = "Identifiants incorrects";
    header("Location: login.php");
    exit;
}
?>
