<?php
require 'db.php';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username == '' || $password == '') {
        $message = "Veuillez remplir tous les champs.";
    } else {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->execute([$username]);

        if ($stmt->fetch()) {
            $message = "Nom d'utilisateur déjà pris.";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");

            if ($stmt->execute([$username, $hashedPassword])) {
                header("Location: login.php");
                exit;
            } else {
                $message = "Erreur lors de l'inscription.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>

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

    <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md border-t-4 border-bordeaux">

        <h2 class="text-3xl font-bold text-center text-bordeaux mb-6">
            Créer un compte
        </h2>

        <form method="POST" class="space-y-4">

            <div>
                <label class="block text-gray-700 font-medium">Nom d'utilisateur</label>
                <input 
                    type="text" 
                    name="username"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-bordeaux focus:border-bordeaux outline-none"
                    placeholder="Entrez votre nom" 
                    required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Mot de passe</label>
                <input 
                    type="password" 
                    name="password"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-bordeaux focus:border-bordeaux outline-none"
                    placeholder="Entrez votre mot de passe" 
                    required>
            </div>

            <button 
                type="submit"
                class="w-full bg-bordeaux text-white py-2 rounded-lg hover:bg-[#5e1721] transition">
                S'inscrire
            </button>

        </form>

        <?php if($message != ''): ?>
            <p class="text-red-600 text-center mt-4"><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>

        <p class="text-center mt-6 text-gray-600">
            Déjà un compte ?
            <a href="login.php" class="text-bordeaux font-semibold hover:underline">
                Se connecter
            </a>
        </p>

    </div>

</body>
</html>
