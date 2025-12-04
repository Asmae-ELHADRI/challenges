<?php
$host = "localhost";
$dbname = "shop_db";
$username = "root";
$password = "root"; 

$pdo = new PDO("mysql:host=localhost;dbname=shop_db", "root", "root");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
