<?php
session_start();

if(isset($_POST["user"]) && $_POST["user"] != ""){
    $userName = $_POST["user"];
}

require("Database.php");
$db = new Database();
//$users = $db->getAllUser();//va chercher la liste des utilisateurs

if($_SESSION["userLog"] != 0){
    $_SESSION["userLog"] = 0;
}else{
    $_SESSION["userName"] = $userName;//met à jour le nom du user dans la session
    $_SESSION["userLog"] = $db->VerifiLoging($_POST);
}

/*
echo("<pre>");
var_dump($user);
echo("<pre>");
*/
header("Location:p-accueil.php");
die();
