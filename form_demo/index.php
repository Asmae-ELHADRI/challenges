<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>form get</h1>
    <fieldset> 
        <form action="resultGet.php" method="get">
            <label for="nom">Name :</label>
            <input type="text" name="nom" placeholder="Enter your name" >
            <br><br>

            <label for="age">Age :</label>
            <input type="text" name="age" placeholder="Enter your age" >
            <br><br>

            <button type="submit">Envoyer</button>
        </form>
    </fieldset>

    <br><br>
    
    <h1>form post</h1>
    <fieldset> 
        <form action="resultPost.php" method="post">
            <label for="email">E-mail :</label>
            <input type="text" name="email" placeholder="enter your email">
            <br><br>

            <label for="password">Password :</label>
            <input type="password" name="password" placeholder="enter your password">
            <br><br>

            <label for="message">Message :</label>
            <textarea name="message" placeholder="enter your message"></textarea>
            <br><br>

            <button type="submit">Submit</button>
        </form>
    </fieldset>
</body>
</html>