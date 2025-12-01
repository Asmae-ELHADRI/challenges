<?php
try {
    $conn = new PDO("mysql:host=localhost;port=8889;dbname=test_db", "root", "root");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Error: " . $e->getMessage());
}
