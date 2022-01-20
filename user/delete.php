<?php
    include"../db.php";


    if(isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];

        global $conn;
        $stmt = $conn->prepare("DELETE FROM klant WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        if($stmt->execute()) http_response_code(200);
        else header('Location: /error.php?code=500');
    } else  header('Location: /error.php?code=400');


