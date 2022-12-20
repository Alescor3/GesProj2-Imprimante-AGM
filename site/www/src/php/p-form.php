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
$fabriquants = $db->getAllFabriquand();


$form = $_SESSION["form"];




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
      <link rel="stylesheet" href="../../resources/css/totalStyle.css">
      <title>Accueil</title>
   </head>
   <body id="fond"> 
   
      <h1>formulaire</h1>

      <?php
         switch($form){
         case 1:
            if(isset($_SESSION["valueForm"])){
               $valueForm = $_SESSION["valueForm"];
            }

            ?>
               <form action="verif.php" method="post">


                  <br>
                  <label for="name">Nom</label>
                  
                  <?php
                     if(isset($_SESSION["valueForm"])){
                        echo("<input type='text' name='name' id='name' placeholder='Aaaa' value ='" . $_SESSION["valueForm"]["string"] . "'>");
                     }else{
                        echo("<input type='text' name='name' id='name' placeholder='Aaaa'>");
                     }
                  ?>

                  <br>
                  <label for="model">Model</label>
                  <input type="text" name="model" id="model" placeholder="Aaaa">

                  <br>
                  <label for="price">Prix</label>
                  <input type="number" name="price" id="price" placeholder="ex: 000.-">

                  <br>
                  <label for="recotverso">RectoVerso</label>
                  <input type="checkbox" id="recotverso" name="recotverso">
                  <br>
                  <label for="papercapacity">Capactité du bac à Papier</label>
                  <input type="number" name="papercapacity" id="papercapacity" placeholder="000">
                  
               
                  <br>
                  <h4>Dimensions</h4>
                  
                  <label for="length">Longeur</label>
                  <input type="number" name="length" id="length" placeholder="000">
                  <label for="with">Largeur</label>
                  <input type="number" name="with" id="with" placeholder="000">
                  <label for="height">Hauteur</label>
                  <input type="number" name="height" id="height" placeholder="000">
         
                  <br>
                  <label for="speed">Vitesse</label>
                  <input type="number" name="speed" id="speed" placeholder="000">
                     

                  <br>
                  <label for="weight">Poid</label>
                  <input type="number" name="weight" id="weight" placeholder="000">
                     
                  <br>
                  <label for="printSize">Resolution de L'impression</label>
                  <input type="text" name="printSize" id="printSize" placeholder="A0,A0,A0">

                  <br>
                  <label for="scanSize">Resolution de la Numerisation</label>
                  <input type="text" name="scanSize" id="scanSize" placeholder="0000 x 0000 ppp">
                     
                  <br>
                  <select name="fabriquant" id="fabriquant">
                     <option value="" class="listeDeroulante">---Fabriquant---</option>
                     <?php
                        foreach($fabriquants as $fabriquant){// affiche la liste des fabriquants de manière dynamique 
                           echo("<option value=" . $fabriquant["idFabriquant"] . ">" . $fabriquant["fabNom"] . "</option>");// sinon on met aucune valeur par défault
                        }
                     ?>
                  </select>

                  <br>
                  <button type="submit" class="btn-submit">Ajouter</button>
                  <button type="reset" class="btn-clear">Supprimer</button>
      
                     </form>

            <?php
            break;

         }

            
            echo("<pre>");
            var_dump($_SESSION);
            echo("</pre>");
            
            //<a href="filtres.php">retour menu</a>
         ?>
   </body>
</html>