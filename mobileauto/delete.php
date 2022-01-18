<?php
    include"../db.php";

global $conn;
    if(isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $stmt = $conn->prepare("DELETE FROM auto WHERE autoID=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        if($stmt->execute()) http_response_code(200);
        else header('Location: /error.php?code=500');

    } else  header('Location: /error.php?code=400');


