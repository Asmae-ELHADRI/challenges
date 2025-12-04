<?php
session_start();
include "config.php";

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérifier l’utilisateur dans la BD
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username=? AND password=?");
    $stmt->execute([$username, $password]);
    $user = $stmt->fetch();

    if ($user) {

        // Créer la session
        $_SESSION['user'] = $username;

        // Remember me (3 jours)
        if (isset($_POST['remember'])) {
            setcookie("remember_user", $username, time() + 3*24*60*60);
        }

        header("Location: dashboard.php");
        exit();
    } else {
        header("Location: login.php?error=1");
        exit();
    }
}
