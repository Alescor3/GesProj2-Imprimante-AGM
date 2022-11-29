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

// variable servant a savoir si un user est connecté
$userLog = 0;

$db = new Database();

$idTeacher = 0;

//------ récupère les données sur la connection du user ------//
if(isset($_SESSION["userLog"])){
   $userLog = $_SESSION["userLog"];
}else{
   $userLog = 0;
}

//------ récupère le nom du user ------//
if(isset($_SESSION["userName"])){
   $userName = $_SESSION["userName"];
}

/*
echo("<pre>");
var_dump($_SESSION);
echo("<pre>");
*/
?>
<!DOCTYPE html>
<html lang="fr">
<link rel="stylesheet" href="../../resources/css/totalStyle.css">
   
   
   <h2>Les recettes de COUSINE</h2>


   <h3>Contact</h3>
   
   <div>
      <a href="p-accueil.php">| Accueil |</a>
      <a href="p-listRecipe.php">| Liste Recettes |</a>
      <?php
         if($userLog == 2){
            echo("<a href='p-addcreate-recipe.php'>| Ajouter/Modif recette |</a>");
         }
      ?>
      <a href="p-contact.php">| Contact |</a>
   </div>
   <br><br>

   <div class="login">
         <form action="userLogin.php?" method="post">
         <?php
            // test si un user est connecté
            if($userLog == 0){// si non il affiche les champs de connection
               ?>
               <form action="userLogin.php" method="post">
                  <label for="user"> </label>
                  <input type="text" name="user" id="user" placeholder="Login">
                  <label for="password"> </label>
                  <input type="password" name="password" id="password" placeholder="Mot de passe">
                  <button type="submit" class="btn btn-login">Se connecter</button>
               </form>
               <?php
            }else{//si oui il affiche le nom du user et son niveau d'autorisations
               echo($userName);
               if($userLog == 1){
                  echo("(user)");
               }else{
                  echo("(admin)");
               }
         ?>
            <button type="submit" class="btn btn-login">Se Déconecter</button>
         </form>
         <?php
         }
         ?>
      </div>

<?php

/*
echo("<pre>");
var_dump($teachers);
echo("<pre>");
*/
?>


