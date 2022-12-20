<?php
require("Database.php");

$value = $_POST;

$_POST["priceNow"] = $_POST["price"];
$nberror = 0;
echo("<pre>");
var_dump($value);
echo("</pre>");
$db = new Database();

if($_POST["recotverso"] == "on")
    $_POST["recotverso"] = 1;
else
    $_POST["recotverso"] = 0;

foreach($value as $id => $value){
    if($value == ""){
        $nberror++;
    }
}
echo("Nombre d'erreur :" . $nberror);
if($nberror == 0){

    $db->createPrinter($_POST);
    header("Location:p-acceuil.php");
}else{
    header("Location:p-form.php");
    $_SESSION["valueForm"] = $_POST;
}

