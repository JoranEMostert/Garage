<?php

//    $servername = "localhost";
//    $username = "root";
//    $password = "";
//    $database = "garage";
//
//    // Create connection
//    $conn = new mysqli($servername, $username, $password, $database);
//
//    // Check connection
//    if ($conn->connect_error) {
//        die("Connection failed: " . $conn->connect_error);
//    }

    $db = new PDO("mysql:host=localhost;dbname=garage_ertan",
        "root", "root");

    function executeStatement($db, $commando, $values = []){
        $query = $db->prepare($commando);
        $query->execute($values);
        $result = $query->fetchALL(PDO::FETCH_ASSOC);
        return $result;
    }

    function sqlzonderResultaat($db, $commando, $values =[]){
        $query = $db->prepare($commando);
        $query->execute($values);
    }

///**
// * @throws Exception
// */
//function executeStatement(string $query, string $types = null, &...$values) {
//        global $conn;
//        $stmt = $conn->prepare($query);
//
//        if($types !== null) {
//            $finalTypes = "";
//            $finalValues = [];
//
//            $i = 0;
//            foreach(str_split($types) as $type) {
//                if(in_array($type, ["s", "b", "i"])) {
//                    if(isset($values[$i])) {
//                        $finalTypes .= $type;
//                        array_push($finalValues, $values[$i]);
//                    } else throw new RuntimeException("Not enough values provided");
//                } else throw new RuntimeException("Invalid type provided '{$type}'");
//                $i++;
//            }
//            if(strlen($finalTypes) > 0) $stmt->bind_param($finalTypes, ...$finalValues);
//        }
//
//        if($stmt->execute()) return $stmt->get_result();
//        else throw new Exception("SQL Error: {$stmt->error}");
//    }

//    executeStatement("DELETE FROM klant WHERE id = ?", "i", 1)