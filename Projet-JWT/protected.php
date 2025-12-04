<?php
require 'vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$secretKey = "MY_SUPER_SECRET_KEY";

$headers = getallheaders();

if (!isset($headers['Authorization'])) {
    http_response_code(401);
    echo json_encode(["error" => "No token"]);
    exit;
}

// Récupérer "Bearer xxx"
list(, $token) = explode(" ", $headers['Authorization']);

try {
    $decoded = JWT::decode($token, new Key($secretKey, 'HS256'));

    echo json_encode([
        "message" => "Access granted",
        "user" => $decoded
    ]);

} catch (Exception $e) {
    http_response_code(401);
    echo json_encode(["error" => "Invalid or expired token"]);
}
?>