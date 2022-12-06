<?php
require("Database.php");

$value = $_POST;

$_POST["priceNow"] = $_POST["price"];

echo("<pre>");
var_dump($value);
echo("</pre>");
$db = new Database();
$db->createRecipe($_POST);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


</body>
</html>