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

$userLog = 0;

$db = new Database();


/*
echo("<pre>");
var_dump($_SESSION);
echo("<pre>");
*/
?>
<!DOCTYPE html>
<html lang="fr">
<link rel="stylesheet" href="../../resources/css/totalStyle.css">
   
   
   <h2>Surnom des ensegniants</h2>
   <div class="title">
      <t >Zone Pour Le Menu</t><br>
   </div>

   <div class="login">
   <?php
   ?>
      <form action="userLogin.php" method="post">
         <label for="user"> </label>
         <input type="text" name="user" id="user" placeholder="Login">
         <label for="password"> </label>
         <input type="password" name="password" id="password" placeholder="Mot de passe">
         <button type="submit" class="btn btn-login">Se connecter</button>
      </form>
   <?php

   ?>
      <form action="delog.php" method="post">
         <button type="submit" class="btn btn-login">Se Déconecter</button>
      </form>
   </div>
   <?php
   
   ?>
   
   <h4>liste des ensegniants</h4>
   <table>
      <tr>
         <th>Nom</th>
         <th>Surnom</th>
         <th>Options</th>
      </tr>
      
<?php
   
   ?>
</table>
<a href="p-addcreate-Teacher.php">Ajouter un nouveau prof</a>
<?php

/*
echo("<pre>");
var_dump($finaly);
echo("<pre>");
*/
?>


