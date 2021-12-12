<?php

session_start();

setcookie("lol", $_SESSION["visit"], time() + 3600);


$_SESSION["visit"] = $_COOKIE['lol'] + 1;

if(isset($_SESSION['visit'])){
echo "deze pagina heb je ".$_SESSION['visit']. " keer bekeken";
}