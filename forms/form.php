<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de connexion</title>
</head>
<body>
    <fieldset>
        <form action="Form1.php" method="post">
            <label for="mail">E-mail :</label>
            <input type="text" name="mail" placeholder="Entrer votre email" required>
            <br><br>

            <label for="password">Mot de passe :</label>
            <input type="password" name="password" placeholder="Entrer votre mot de passe" required>
            <br><br>

            <button type="submit">Envoyer</button>
        </form>
    </fieldset>
</body>
</html>
