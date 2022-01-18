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
    <form action="mobileauto/register.php" method="post">
        <label for="kenteken">Kenteken:</label><br>
        <input type="text" id="kenteken" name="kenteken" placeholder="kenteken"><br>
        <label for="klantid">klantid:</label><br>
        <input type="number" id="klantid" name="klantid" placeholder="klantid"><br>
        <label for="merk">Merk:</label><br>
        <input type="text" id="merk" name="merk" placeholder="Merk"><br>
        <label for="type">Type:</label><br>
        <input type="text" id="type" name="type" placeholder="Type"><br>
        <label for="kmstand">KMstand:</label><br>
        <input type="text" id="kmstand" name="kmstand" placeholder="KMstand"><br>
        <input type="submit" value="Submit">
    </form>
    <a href="index.php">Terug</a>
</section>
</body>
</html>
<?php
