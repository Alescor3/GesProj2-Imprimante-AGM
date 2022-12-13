<?php
require("Database.php");

$value = $_POST;

$_POST["priceNow"] = $_POST["price"];
$nberror = 0;
echo("<pre>");
var_dump($value);
echo("</pre>");
$db = new Database();

foreach($value as $id => $value){
    if($value == ""){
        $nberror++;
    }
}
echo("Nombre d'erreur :" . $nberror);
if($nberror == 0){

    $db->createPrinter($_POST);
}
