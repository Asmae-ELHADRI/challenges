<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];

// Cookie de visites
if (isset($_COOKIE['visites'])) {
    $visites = $_COOKIE['visites'] + 1;
} else {
    $visites = 1;
}
setcookie('visites', $visites, time() + 365*24*60*60);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard</title>

    <style>
        :root {
            --c1: #D1C7BD;
            --c2: #AC9C8D;
            --c3: #741D29;
            --c4: #D9D9D9;
            --c5: #322D29;
            --c6: #efe9e1a4;
        }
    </style>
</head>

<body class="bg-[var(--c6)] min-h-screen">

    <!-- NAVBAR -->
    <nav class="bg-[var(--c3)] text-[var(--c6)] p-4 flex justify-between items-center shadow-lg">
        <h1 class="text-xl font-semibold">Dashboard</h1>

        <a href="logout.php" class="bg-[var(--c6)] text-[var(--c3)] px-4 py-2 rounded-lg 
        hover:bg-[var(--c4)] transition">
            Se déconnecter
        </a>
    </nav>

    <!-- CONTENU -->
    <div class="flex flex-col items-center justify-center mt-20">

        <div class="bg-white border border-[var(--c1)] shadow-lg rounded-xl p-8 w-96 text-center">

            <h2 class="text-2xl font-bold text-[var(--c3)] mb-4">
                Bienvenue, <?= htmlspecialchars($username) ?> 👋
            </h2>

            <p class="text-[var(--c5)] text-lg mb-4">
                Nombre de visites : 
                <span class="font-semibold text-[var(--c3)]"><?= $visites ?></span>
            </p>

            <p class="text-sm text-[var(--c2)]">
                Cette page est protégée par une session.
            </p>

        </div>

    </div>

</body>
</html>
