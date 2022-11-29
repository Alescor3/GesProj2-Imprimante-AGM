<?php
/**
 * 
 * 
 * Auteur : Dussault Morgan
 * Date : 03.10.2022
 * Description : page de détail de l'utilisateur-
 */
session_start();
require("Database.php");

$idRecipe = $_GET["idRecipe"];

$db = new Database();

$recipe = $db->GetOneRecipe($_GET);

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
var_dump($recipe);
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
   
      <h2>Les recettes de COUSINE</h2>
      <h3>Liste recettes</h3>

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
      <div>
         <?php
               foreach($recipe[0] as $id => $value){
                  if($id === "recImage"){
                     echo("<img src='" . $value . "'></a><br>");

                  }else if ($id === "recSource"){
                     echo("<a href=" . $id. ">Source</a><br>");
                  }else if($id == "recNbPersonne"){
                     if($value > 1){
                        echo("Pour " . $value. " personnes <br>");
                     }else{
                        echo("Pour " . $value. " personne <br>");
                     }
                  }else{
                     echo($value . "<br>");
                  }

               }
            
         ?>
   </body>
</html>
<?php




/*
echo("<pre>");
var_dump($recipe);
echo("<pre>");
*/