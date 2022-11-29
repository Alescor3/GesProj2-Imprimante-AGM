<?php

require("Database.php");
$db = new Database();

date_default_timezone_set('UTC');
$today = date("YmdHis");                     // 2001-03-10 17:16:18
$error = 0;
$nbimg = 1;
$target_Path = "../../userContent/";
$target_Path = $target_Path.basename($today . "-" . $_FILES['downloadFile']['name']);

$path = "../../userContent/";

move_uploaded_file($_FILES['downloadFile']['tmp_name'], $target_Path );

$_POST["image"] = $today . "-" . $_FILES['downloadFile']['name'];

if($_POST["name"] == ""){
   $error++;
}
if($_POST["type"] == ""){
   $error++;
}
if($_POST["description"] == ""){
   $error++;
}


if($error == 0){
   $db->createRecipe($_POST);
   header("Location:p-accueil.php");
}


echo("<pre>");
var_dump($_POST);
echo("<pre>");

?>