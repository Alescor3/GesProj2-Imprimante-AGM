<?php


session_start();
require("Database.php");

$db = new Database();

$nbError = 0;

$filtres = $_POST;


echo("<br> Debug Zone<br>-----------------------------------------<br>");
if($filtres["prixMax"] !== ""){
    echo("Prix Max : " . $filtres["prixMax"] . "<br>");
}else{
    $nbError++;
}

if($filtres["hauteur"] !== ""){
    echo("Hauteur : " . $filtres["hauteur"] . "<br>");
}else{
    $nbError++;
}

if($filtres["largeur"] !== ""){
    echo("Longeur : " . $filtres["longeur"] . "<br>");
}else{
    $nbError++;
}

if($filtres["profondeur"] !== ""){
    echo("Profondeur : " . $filtres["profondeur"] . "<br>");
}else{
    $nbError++;
}

if(isset($filtres["disponibilite"]) && $filtres["disponibilite"] !== ""){
    echo("Disponibilite : " . $filtres["disponibilite"] . "<br>");
    $nbError++;
}else{
    $nbError++;
}

if($filtres["fabriquant"] !== ""){
    echo("Fabriquant : " . $filtres["fabriquant"] . "<br>");
}else{
    $nbError++;
}

if($filtres["model"] !== ""){
    echo("Model : " . $filtres["model"] . "<br>");
}else{
    $nbError++;
}

echo("-----------------------------------------<br>");
echo($nbError);

if($nbError == 0)
    $db->GetPrinterWithFiltre($filtres);


echo("<pre>");
var_dump($filtres);
echo("</pre>");

?>
<html>

<a href="p-accueil.php">retour menu</a>
</html>