<?php
    include"../db.php";

    if(!empty($_POST['id']) && !empty($_POST['naam']) && !empty($_POST['adres']) && !empty($_POST['postcode']) && !empty($_POST['plaats'])) {
        $id = $_POST['id'];
        $naam = $_POST['naam'];
        $adres = $_POST['adres'];
        $postcode = $_POST['postcode'];
        $plaats = $_POST['plaats'];

        global $conn;
        $stmt = $conn->prepare("UPDATE klant SET naam=?,adres=?,postcode=?,plaats=? WHERE id=?");
        $stmt->bind_param("ssssi", $naam, $adres, $postcode, $plaats, $id);
        if($stmt->execute()) header("Location: /");
        else header('Location: /error.php?code=500');
    } else header('Location: /error.php?code=400');
