<?php
session_start();
?>

<form action="login_process.php" method="POST">

    <input type="text" name="username" placeholder="Username"
           value="<?php echo isset($_COOKIE['remember_user']) ? $_COOKIE['remember_user'] : '' ?>">

    <input type="password" name="password" placeholder="Password">

    <label>
        <input type="checkbox" name="remember"> Se souvenir de moi
    </label>

    <button type="submit" name="login">Se connecter</button>

</form>

<?php 
if (isset($_GET['error'])) {
    echo "<p style='color:red'>Identifiants incorrects</p>";
}
?>
