<?php
include "db.php";
$naam = "<script>alert(\"ur gay\")</script>";
$adres = "Zwanendaal 80";
$plaats ="asdasd";
$postcode ="2345RS";

try {
//    executeStatement("INSERT INTO klant (plaats, naam, adres, postcode) VALUES (?, ?, ?, ?)", "ssss", $plaats, $naam, $adres, $postcode);
    echo "klant toegevoegd";
} catch (Exception $e) {
    echo "no no";
}
// optionel:
// $stmt = $conn->prepare("INSERT INTO klant (plaats, naam, adres, postcode) VALUES (?, ?, ?, ?)");
//$stmt->bind_param("ssss",$plaats, $naam, $adres, $postcode);
//if($stmt->execute())
//    echo "klant added";
//else
//    echo "error: {$stmt->error}";

//$result = $conn->query("SELECT * FROM klant");
try {
    $result = executeStatement("SELECT * FROM klant");
} catch (Exception $e) {
}

try {
    $result = executeStatement("DELETE FROM klant WHERE ");
} catch (Exception $e) {
}

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $id = htmlentities($row["id"]);
        $naam = htmlentities($row["naam"]);
        $adres = htmlentities($row["adres"]);
        $postcode = htmlentities($row["postcode"]);
        $plaats = htmlentities($row["plaats"]);
        echo "id: {$id}, naam: {$naam}, postcode: {$postcode}, plaats: {$plaats}, adres: {$adres}<br>";
    }
} else {
    echo "0 results";
}

//$naam = "Kevin";
//$stmt = $conn->prepare("INSERT INTO klant (naam, adres) VALUES (?, ?)");
//$stmt->bind_param("ss", $naam, $adres);
//if($stmt->execute()) echo "goed";
