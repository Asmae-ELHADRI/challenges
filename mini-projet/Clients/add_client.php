<form action="add_client_process.php" method="post">

    <label for="name">Nom :</label>
    <input type="text" name="name" id="name" required>
    <br><br>

    <button type="submit">Ajouter le client</button>

</form>
<?php
if (isset($_GET['success'])) {
    echo "<p style='color:green'>client ajouter avec succes </p>";
}
?>