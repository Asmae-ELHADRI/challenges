<?php
require 'db.php';
$message = "";

if ($_POST) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (name,email,password) VALUES (?,?,?)");
    $stmt->execute([$name, $email, $pass]);

    $message = "User added!";
}
?>

<h2>Add User</h2>
<p><?php echo $message; ?></p>

<form method="POST">
    Name: <input name="name"><br><br>
    Email: <input name="email"><br><br>
    Password: <input type="password" name="password"><br><br>
    <button>Add</button>
</form>

<a href="list.php">Users List</a>
