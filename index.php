<?php include "db.php";?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vscode-codicons@0.0.17/dist/codicon.css">
    <link rel="stylesheet" href="scss/style.scss">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Garage</title>
</head>
<body>
<section>

    <input id='myInput' onkeyup='searchTable()' type='text'>
    <a href="raygelsvaderiszwart.php">Register</a>
    <table id="myTable">
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <th>Adres</th>
            <th>Postcode</th>
            <th>Plaats</th>
            <th></th>
        </tr>
        <?php
            $result = $conn->query("SELECT * FROM klant ORDER BY id");
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $id = htmlentities($row["id"]);
                    $naam = htmlentities($row["naam"]);
                    $adres = htmlentities($row["adres"]);
                    $postcode = htmlentities($row["postcode"]);
                    $plaats = htmlentities($row["plaats"]);
                    echo<<<END
        <tr id="$id">
            <td>$id</td>
            <td>$naam</td>
            <td>$adres</td>
            <td>$postcode</td>
            <td>$plaats</td>
            <td>
                <button><i class="codicon codicon-pencil"></i></button>
                <button><i class="codicon codicon-trash"></i></button>
            </td>
        </tr>
END;
                }
            }
        ?>
    </table>
</section>
<section>
    <input id='myInput' onkeyup='searchTable()' type='text'>
    <a href="raygelsvaderiszwart.php">Register</a>
    <table id="myTable">
        <tr>
            <th>autoid</th>
            <th>klantid</th>
            <th>kenteken</th>
            <th>merk</th>
            <th>type</th>
            <th>kmstand</th>
            <th></th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM auto ORDER BY autoID");
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $autoID = htmlentities($row["autoID"]);
                $klantid = htmlentities($row["klantid"]);
                $kenteken = htmlentities($row["kenteken"]);
                $merk = htmlentities($row["merk"]);
                $type = htmlentities($row["type"]);
                $kmstand = htmlentities($row["kmstand"]);
                echo<<<END
        <tr id="$id">
            <td>$autoID</td>
            <td>$klantid</td>
            <td>$merk</td>
            <td>$type</td>
            <td>$kmstand</td>
            <td>
                <button><i class="codicon codicon-pencil"></i></button>
                <button><i class="codicon codicon-trash"></i></button>
            </td>
        </tr>
END;
            }
        }
        ?>
    </table>
</section>
<script src="javascript/raygell.js"></script>
<script src="javascript/search.js"></script>
</body>
</html>