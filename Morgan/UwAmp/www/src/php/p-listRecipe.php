<?php
/**
 * 
 * 
 * Auteur : Dussault Morgan
 * Date : 03.10.2022
 * Description : page d'accueil
 */

use function PHPSTORM_META\type;

session_start();
require("Database.php");

// variable servant a savoir si un user est connecté
$userLog = 0;


$db = new Database();

if(isset($_GET["filtre"]) && $_GET["filtre"] !== ""){
   $recipes = $_SESSION["recipes"];
}else{
   $recipes = $db->GetAllRecipes();
}

$types = $db->GetAllType();

$test = 0;
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
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="../../resources/css/totalStyle.css">
   </head>
   <body>

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

      <h2>Les recettes de COUSINE</h2>
      <h3>Liste recettes</h3>
      
      <br><br>
      <div class="login">
         <form action="userLogin.php" method="post">
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
      <div class="filtres">
         <form action="verif.php?filtres=1" method="post">

         <label class="size" for="type" >Type</label><br>
            <select name="type" id="type">
               <option value="" class="listeDeroulante">--Type--</option>
               <?php

                  foreach($types as $type){
                     echo("<option value=" . $type["recType"] . ">" . $type["recType"] . "</option>");
                  }

                  
                  
                  ?>
            </select>
            <br>
            <label class="size" for="name" >Nom de la recette</label><br>
            <input type='text' name='name' id='name'>
            <br>
            <button type="submit" class="btn-research">rechercher</button>
         </form>
      </div>
      <br><br>
      <div>
         <?php
            foreach($recipes as $recipe){
               echo("<img src='" . $recipe["recImage"] . "'></a><br>");
               echo($recipe["recName"]. "<br>");
               echo($recipe["recType"]. "<br>");
               echo($recipe["recDescription"]. "<br>");
               if($recipe["recNbPersonne"] > 1){
                  echo("Pour " . $recipe["recNbPersonne"]. " personnes <br>");
               }else{
                  echo("Pour " . $recipe["recNbPersonne"]. " personne <br>");
               }
               echo("<a href=" . $recipe["recSource"]. ">Source</a><br>");
               echo("<a href=p-detail.php?idRecipe=" . $recipe["idRecette"] . " >Detail " . $recipe["idRecette"] ."</a><br><br><br><br>");
            }
         ?>
      </div>
   </body>
</html>
<?php



echo("<pre>");
var_dump($types);
echo("<pre>");

?>


