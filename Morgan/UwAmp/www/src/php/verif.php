<?php
/**
 * 
 * 
 * Auteur : Dussault Morgan
 * Date : 03.10.2022
 * Description : page d'accueil
 */
session_start();
require("Database.php");

$db = new Database();
$test = $db->__construct();

$nbError = 0;// nombre d'erreurs
$senteceError = "";//phrase d'erreur (sert quand on a des problèmes et ça sert bien)

$types = $db->GetRecipeWithType($_POST["type"]);

$_SESSION["recipes"] = $types;

/*
echo("<pre>");
var_dump($types);
echo("<pre>");
*/
header("Location:p-listRecipe.php?filtre=1");
die();


