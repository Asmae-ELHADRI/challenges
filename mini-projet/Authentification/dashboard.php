<?php
session_start();

// session

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<h2>Bienvenue <?php echo $_SESSION['user']; ?> !</h2>

<a href="logout.php">Se déconnecter</a>
