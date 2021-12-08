<?php
    include"../db.php";

    if(isset($_GET['id']) && is_numeric($_GET['id'])) {
        try {
            executeStatement("DELETE FROM klant WHERE id = ?","i", $_GET['id']);
            http_response_code(200);
        }catch(Exception $e){
            http_response_code(500);
        }
    } else http_response_code(400);