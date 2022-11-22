<?php


session_start();
require("Database.php");


$filtres = $_POST;


echo("<br> Debug Zone<br>-----------------------------------------<br>");
if($filtres["prixMax"] !== ""){
    echo("Prix Max : " . $filtres["prixMax"] . "<br>");
}

if($filtres["hauteur"] !== ""){
    echo("Hauteur : " . $filtres["hauteur"] . "<br>");
}

if($filtres["longeur"] !== ""){
    echo("Longeur : " . $filtres["longeur"] . "<br>");
}

if($filtres["profondeur"] !== ""){
    echo("Profondeur : " . $filtres["profondeur"] . "<br>");
}

if(isset($filtres["disponibilite"]) && $filtres["disponibilite"] !== ""){
    echo("Disponibilite : " . $filtres["disponibilite"] . "<br>");
}

if($filtres["fabriquant"] !== ""){
    echo("Fabriquant : " . $filtres["fabriquant"] . "<br>");
}

if($filtres["model"] !== ""){
    echo("Model : " . $filtres["model"] . "<br>");
}

echo("-----------------------------------------<br>");





/*
echo("<pre>");
var_dump($filtres);
echo("</pre>");
*/
?>
<html>

<a href="p-accueil.php">retour menu</a>
</html>