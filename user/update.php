<?php
    include"../db.php";

    if(isset($_GET['id']) && !empty($_POST['naam']) && !empty($_POST['adres']) && !empty($_POST['postcode']) && !empty($_POST['plaats'])) {
        $id = $_GET['id'];
        $naam = $_POST['naam'];
        $adres = $_POST['adres'];
        $postcode = $_POST['postcode'];
        $plaats = $_POST['plaats'];

        $stmt = $conn->prepare("UPDATE klant SET naam=?,adres=?,postcode=?,plaats=? WHERE id=?");
        $stmt->bind_param("ssssi", $naam, $adres, $postcode, $plaats, $id);
        if($stmt->execute()) http_response_code(200);
        else {
            http_response_code(500);
            exit($stmt->error);
        }
    } else http_response_code(400);