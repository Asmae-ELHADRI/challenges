<?php
require 'vendor/autoload.php';
require 'db.php';
use Firebase\JWT\JWT;

// Clé secrète
$secretKey = "MY_SUPER_SECRET_KEY";

header("Content-Type: application/json");

// Récupérer le JSON envoyé
$input = file_get_contents("php://input");
$data = json_decode($input, true);


// Utilisateur et mot de passe envoyés
$username = $data['username'] ?? '';
$password = $data['password'] ?? '';

// On ne vérifie pas le hash pour tester d'abord
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Pour tester si le user est trouvé
file_put_contents("debug_user.txt", print_r($user, true));

// ⚡ Test direct : comparer mot de passe en clair
if ($user && $password === '1234') {

    $payload = [
        "user_id" => $user['id'],
        "username" => $user['username'],
        "exp" => time() + 3600
    ];

    $jwt = JWT::encode($payload, $secretKey, 'HS256');
    echo json_encode(["token" => $jwt]);

} else {
    http_response_code(401);
    echo json_encode(["error" => "Invalid credentials"]);
}
