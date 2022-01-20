<?php
    include"../db.php";

    if(!empty($_POST['kenteken']) && !empty($_POST['klantid']) && !empty($_POST['merk']) && !empty($_POST['type']) && !empty($_POST['kmstand'])) {
        $id = null;
        $kenteken = $_POST['kenteken'];
        $klantid = $_POST['klantid'];
        $merk = $_POST['merk'];
        $type = $_POST['type'];
        $kmstand = $_POST['kmstand'];

        global $conn;
        $stmt = $conn->prepare("INSERT INTO auto VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sisssi", $id, $klantid, $kenteken, $merk, $type, $kmstand);
        if($stmt->execute()) header("Location: /");
        else header('Location: /error.php?code=500');
    } else header('Location: /error.php?code=400');