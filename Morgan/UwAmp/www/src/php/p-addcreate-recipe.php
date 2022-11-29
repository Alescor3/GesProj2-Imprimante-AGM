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





?>
<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../../resources/css/totalStyle.css">
      <title>Document</title>
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
      <h3>Ajout/Modif</h3>

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
      <form method="post" action="checkFile.php" enctype="multipart/form-data">
         <p>
            <label for="downloadFile">Image de la recette :</label>
            <input type="file" name="downloadFile" id="downloadFile" accept="image/png, image/jpeg" />
         </p>
         <br>
         <p>
            <label class="size" for="name">Nom</label><br>
            <input type='text' name='name' id='name'>
         </p>
         <label class="size" for="type" >Type</label><br>
         <select name="type" id="type">
               <?php
               foreach($db->GetAllType() as $type){// affiche la liste des sections de manière dynamique 
                     echo("<option value=" . $type["recType"] . " selected>" . $type["recType"] . "</option>");// on la selecte
               }
               ?>
         </select>
         <br><br>
         <label class="size" for="description" >Déscription</label><br>
         <textarea type='text' name='description' id='description'></textarea>
         <br>
         <p>
            <label class="size" for="source">Source</label><br>
            <input type='text' name='source' id='source' placeholder="Facultatif">
         </p>
         <br>
         <p>
            <input type="submit" name="" value="Ajouter la recette" />
         </p>
      </form>    
   </body>
</html>
<?php
/*
echo("<pre>");
var_dump($type);
echo("<pre>");*/