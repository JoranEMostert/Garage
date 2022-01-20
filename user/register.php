<?php
    include"../db.php";

    if(!empty($_POST['naam']) && !empty($_POST['adres']) && !empty($_POST['postcode']) && !empty($_POST['plaats'])) {
        $id = null;
        $naam = $_POST['naam'];
        $adres = $_POST['adres'];
        $postcode = $_POST['postcode'];
        $plaats = $_POST['plaats'];

        global $conn;
        $stmt = $conn->prepare("INSERT INTO klant VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $id, $naam, $adres, $postcode, $plaats);
        if($stmt->execute()) header("Location: /");
        else header('Location: /error.php?code=500');
    } else header('Location: /error.php?code=400');