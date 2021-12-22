<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register</title>
</head>
<body>
<section>
    <form action="user/Insert.php" method="post">
        <label for="naam">Naam:</label><br>
        <input type="text" id="naam" name="naam" placeholder="Naam"><br>
        <label for="adres">Adres:</label><br>
        <input type="text" id="adres" name="adres" placeholder="Adres"><br>
        <label for="postcode">Postcode:</label><br>
        <input type="text" id="postcode" name="postcode" placeholder="Postcode"><br>
        <label for="plaats">Plaats:</label><br>
        <input type="text" id="plaats" name="plaats" placeholder="Plaats"><br>
        <input type="submit" value="Submit">
    </form>
    <a href="index.php">Terug</a>
</section>
</body>
</html>
<?php
