<?php


session_start();
$error = $_SESSION["error"] ?? "";
unset($_SESSION["error"]);
?>

<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

<div class="bg-white p-8 rounded-xl shadow-lg w-80">
    <h2 class="text-2xl font-bold text-center mb-4">Connexion</h2>

    <?php if ($error): ?>
        <p class="text-red-500 text-sm mb-4 text-center"><?= $error ?></p>
    <?php endif; ?>

    <form action="login_process.php" method="POST">
        <label class="block mb-2">Nom d'utilisateur</label>
        <input type="text" name="username" class="w-full p-2 border rounded mb-4">

        <label class="block mb-2">Mot de passe</label>
        <input type="password" name="password" class="w-full p-2 border rounded mb-4">

        <button class="w-full bg-blue-600 text-white py-2 rounded mt-2 hover:bg-blue-700 transition">
            Se connecter
        </button>
    </form>
</div>

</body>
</html>
