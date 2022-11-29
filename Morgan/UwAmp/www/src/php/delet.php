<?php
/**
 * 
 * Auteur : Dussault Morgan
 * Date : 03.10.2022
 * Description : page pour la suppression d'un prof
 * 
 */
session_start();
require("Database.php");

$taVariable = $_GET["idTeacher"];

$db = new Database();
$teacher = $db->getOneTeacher($taVariable);

$db ->deletTeacher($taVariable);
header("Location:p-accueil.php");
die();

?>




