<?php
require 'db.php';

$id = $_GET["id"];

$stmt = $conn->prepare("DELETE FROM users WHERE id=?");
$stmt->execute([$id]);

echo "Deleted! <a href='list.php'>Back</a>";
