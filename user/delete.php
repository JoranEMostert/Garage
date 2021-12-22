<?php
    include"../db.php";


    if(isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $stmt = $conn->prepare("DELETE FROM klant WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        if($stmt->execute()) http_response_code(200);
        else http_response_code(500);
    } else http_response_code(400);

