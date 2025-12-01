<?php
require 'db.php';

$id = $_GET["id"];
$message = "";

// get user
$stmt = $conn->prepare("SELECT * FROM users WHERE id=?");
$stmt->execute([$id]);
$user = $stmt->fetch();

// update
if ($_POST) {
    $name = $_POST["name"];
    $email = $_POST["email"];

    if ($_POST["password"]) {
        $pass = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE users SET name=?, email=?, password=? WHERE id=?");
        $stmt->execute([$name, $email, $pass, $id]);
    } else {
        $stmt = $conn->prepare("UPDATE users SET name=?, email=? WHERE id=?");
        $stmt->execute([$name, $email, $id]);
    }

    $message = "Updated!";
}
?>

<h2>Edit User</h2>
<p><?php echo $message; ?></p>

<form method="POST">
    Name: <input name="name" value="<?php echo $user['name']; ?>"><br><br>
    Email: <input name="email" value="<?php echo $user['email']; ?>"><br><br>
    New Password (optional): <input type="password" name="password"><br><br>
    <button>Update</button>
</form>

<a href="list.php">Back</a>
