<?php

session_start();
require("Database.php");

$db = new Database();

$nbError = 0;

$filtres = $_POST;
$html = "";

$html .= "<br> Debug Zone<br>-----------------------------------------<br>";
if($filtres["prixMax"] !== ""){
    $html .= "Prix Max : " . $filtres["prixMax"] . "<br>";
    switch($filtres["prixMax"]){
        case "200": $filtres["prixMin"] = 0; break;
        case "500": $filtres["prixMin"] = 200; break;
        case "1000": $filtres["prixMin"] = 500; break;
        case "2000": $filtres["prixMin"] = 1000; break;
        case "2000+": $filtres["prixMin"] = "max"; break;
        default: break;
    }
}else{
    $nbError++;
}

if($filtres["hauteur"] !== ""){
    $html .= "Hauteur : " . $filtres["hauteur"] . "<br>";
}else{
    $nbError++;
}

if($filtres["largeur"] !== ""){
    $html .= "Longeur : " . $filtres["longeur"] . "<br>";
}else{
    $nbError++;
}

if($filtres["profondeur"] !== ""){
    $html .= "Profondeur : " . $filtres["profondeur"] . "<br>";
}else{
    $nbError++;
}

if(isset($filtres["disponibilite"]) && $filtres["disponibilite"] !== ""){
    $html .= "Disponibilite : " . $filtres["disponibilite"] . "<br>";
    $nbError++;
}else{
    $nbError++;
}

if($filtres["fabriquant"] !== ""){
    $html .= "Fabriquant : " . $filtres["fabriquant"] . "<br>";
}else{
    $nbError++;
}

if($filtres["model"] !== ""){
    $html .= "Model : " . $filtres["model"] . "<br>";
}else{
    $nbError++;
}

$html .= "-----------------------------------------<br>";
echo($nbError);

if($nbError == 0)
    $db->GetPrinterWithFiltre($filtres);

?>
<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../../resources/css/totalStyle.css">
      <title>Accueil</title>
   </head>
   <body id="fond"> 
        <p><?=$html?></p>
        <a href="p-accueil.php">retour menu</a>
    </body>
</html>