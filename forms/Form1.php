<?php

$email = $_POST ['mail']; 

if (empty($email)) {
    echo "required";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";
} else {
    $cleanEmail = htmlspecialchars($email);
    echo "valid email: " . $cleanEmail;
}

?>