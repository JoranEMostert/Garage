<?php

   $servername = "localhost";
   $username = "root";
   $password = "";
   $database = "garage";

   // Create connection
   $conn = new mysqli($servername, $username, $password, $database);

   // Check connection
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }

   // create tables
   $conn->query("CREATE TABLE IF NOT EXISTS `{$database}`.`klant` ( `id` INT NOT NULL AUTO_INCREMENT, `naam` VARCHAR(255) NOT NULL, `adres` VARCHAR(255) NOT NULL, `postcode` VARCHAR(6) NOT NULL, `plaats` VARCHAR(255) NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;");
   $conn->query("CREATE TABLE IF NOT EXISTS `{$database}`.`auto` ( `autoID` INT NOT NULL AUTO_INCREMENT, `klantid` INT NOT NULL, `kenteken` VARCHAR(8) NOT NULL, `merk` VARCHAR(255) NOT NULL, `type` VARCHAR(255) NOT NULL, `kmstand` INT NOT NULL, PRIMARY KEY (`autoID`), CONSTRAINT `klant` FOREIGN KEY (`klantid`) REFERENCES `{$database}`.`klant` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;");