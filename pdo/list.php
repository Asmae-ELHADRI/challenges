<?php
require 'db.php';

$search = $_GET["search"] ?? "";

if ($search) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE name LIKE ?");
    $stmt->execute(["%$search%"]);
} else {
    $stmt = $conn->query("SELECT * FROM users");
}

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Users List</h2>

<form>
    <input name="search" placeholder="Search..." value="<?php echo $search; ?>">
    <button>Search</button>
</form>

<br>

<table border="1" cellpadding="5">
<tr><th>ID</th><th>Name</th><th>Email</th><th>Actions</th></tr>

<?php foreach($users as $u): ?>
<tr>
    <td><?php echo $u["id"]; ?></td>
    <td><?php echo $u["name"]; ?></td>
    <td><?php echo $u["email"]; ?></td>
    <td>
        <a href="edit.php?id=<?php echo $u['id']; ?>">Edit</a> |
        <a href="delete.php?id=<?php echo $u['id']; ?>">Delete</a>
    </td>
</tr>
<?php endforeach; ?>

</table>

<br>
<a href="add.php">Add New User</a>
