<?php
session_start();
require 'db.php';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username == '' || $password == '') {
        $message = "Veuillez remplir tous les champs.";
    } else {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            header("Location: dashboard.php");
            exit;
        } else {
            $message = "Nom d'utilisateur ou mot de passe incorrect.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Ajout de ta couleur perso -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        bordeaux: '#741D29'
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white p-8 rounded-xl shadow-lg w-96 border-t-4 border-bordeaux">

        <h2 class="text-3xl font-bold text-center mb-6 text-bordeaux">
            Connexion
        </h2>

        <form method="POST" class="space-y-4">

            <input 
                type="text" 
                name="username" 
                placeholder="Nom d'utilisateur"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-bordeaux focus:border-bordeaux outline-none"
                required
            >

            <input 
                type="password" 
                name="password" 
                placeholder="Mot de passe"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-bordeaux focus:border-bordeaux outline-none"
                required
            >

            <button 
                type="submit"
                class="w-full bg-bordeaux text-white py-2 rounded-lg hover:bg-[#5e1721] transition duration-300"
            >
                Se connecter
            </button>
        </form>

        <?php if($message != ''): ?>
            <p class="text-red-600 text-center mt-4">
                <?= htmlspecialchars($message) ?>
            </p>
        <?php endif; ?>

        <p class="text-center text-sm mt-4 text-gray-600">
            Pas encore de compte ?
            <a href="register.php" class="text-bordeaux font-semibold hover:underline">
                S'inscrire
            </a>
        </p>

    </div>

</body>
</html>
