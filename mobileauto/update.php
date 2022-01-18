<?php
    include"../db.php";

if(!empty($_POST['autoID']) && !!empty($_POST['kenteken']) && !empty($_POST['klantid']) && !empty($_POST['merk']) && !empty($_POST['type']) && !empty($_POST['kmstand'])) {
    $id = $_POST['autoID'];
    $kenteken = $_POST['kenteken'];
    $klantid = $_POST['klantid'];
    $merk = $_POST['merk'];
    $type = $_POST['type'];
    $kmstand = $_POST['kmstand'];

        $stmt = $conn->prepare("UPDATE auto SET kenteken=?,klantid=?,merk=?,type=?,kmstand=? WHERE autoID=?");
        $stmt->bind_param("sisssi", $kenteken, $klantid, $merk, $type, $kmstands, $id);
        if($stmt->execute()) http_response_code(200);
        else {
            header('Location: /error.php?code=500');
        }
    } else header('Location: /error.php?code=500');
