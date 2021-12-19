<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


// session count
session_start();

$_SESSION["visit"] += 1;

if(isset($_SESSION['visit'])){
    echo "deze pagina heb je ".$_SESSION["visit"]. " keer bekeken";
    echo "<br>";
}
// cookie count
if (!isset($_COOKIE['count'])) { 
    echo "eerste keer op deze website"; 
    $cookie = 1;
    setcookie("count", $cookie);
  }else{
    $cookie = ++$_COOKIE['count'];
    setcookie("count", $cookie, time() + 36000); 
    echo "je hebt deze website in totaal ".$_COOKIE['count']." keer bekeken. <br> <br>"; 
    }

    // random string
    function Stringg($length = 2) {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    echo rand(1000, 9999);
    echo Stringg();
    echo "<br>";

    //function oppervlakte
    function opp($straal = 5){
        $lolo = $straal*$straal*3.14159265359;
        return $lolo;
    }
    //function omtrek
    function omt($straal = 5){
        $lolol = $straal+$straal*3.14159265359;
        return $lolol;
    }
    echo "de omtrek is:".omt()." M";
    echo '<br>';
    echo 'de opvlakte is:'.opp().' M2';