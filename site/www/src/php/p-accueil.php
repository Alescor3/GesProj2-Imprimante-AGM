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
$testNom = $db->nameFiltre("a");
$models = $db->getAllModels();
$_SESSION["printer"] = $db->getAllImprimante();
$printerList = $_SESSION["printer"];
$_SESSION["form"] = 1;
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
      <header>
         <h1>Liste imprimante</h1>
         <div class="filtre">            
            <form action="p-filtres.php" method="post">
            
               <select name="prixMax" id="prixMax">
                  <option value="" class="listeDeroulante">---Prix Max---</option>
                  <option value="200" class="listeDeroulante"> 0 - 200.- </option>
                  <option value="500" class="listeDeroulante"> 200 - 500.- </option>
                  <option value="100" class="listeDeroulante"> 500 - 1000.- </option>
                  <option value="2000" class="listeDeroulante"> 1000 - 2000.- </option>
                  <option value="2000+" class="listeDeroulante"> 2000.- + </option>
               </select>
               
               <select name="hauteur" id="hauteur">
               <option value="" class="listeDeroulante">---Profondeur---</option>
                  <option value="25" class="listeDeroulante"> 0 - 25cm </option>
                  <option value="50" class="listeDeroulante"> 25 - 50cm </option>
                  <option value="75" class="listeDeroulante"> 50 - 75cm </option>
                  <option value="100" class="listeDeroulante"> 75 - 100cm </option>
                  <option value="100+" class="listeDeroulante"> 100cm + </option>
               </select>
               
               <select name="largeur" id="largeur">
               <option value="" class="listeDeroulante">---Profondeur---</option>
                  <option value="25" class="listeDeroulante"> 0 - 25cm </option>
                  <option value="50" class="listeDeroulante"> 25 - 50cm </option>
                  <option value="75" class="listeDeroulante"> 50 - 75cm </option>
                  <option value="100" class="listeDeroulante"> 75 - 100cm </option>
                  <option value="100+" class="listeDeroulante"> 100cm + </option>
               </select>
               
               <select name="profondeur" id="profondeur">
                  <option value="" class="listeDeroulante">---Profondeur---</option>
                  <option value="25" class="listeDeroulante"> 0 - 25cm </option>
                  <option value="50" class="listeDeroulante"> 25 - 50cm </option>
                  <option value="75" class="listeDeroulante"> 50 - 75cm </option>
                  <option value="100" class="listeDeroulante"> 75 - 100cm </option>
                  <option value="100+" class="listeDeroulante"> 100cm + </option>
               </select>
               
               <label for="disponibilite">Seulement disponible</label>
               <input type="checkbox" id="disponibilite" name="disponibilite">
               
               <select name="fabriquant" id="fabriquant">
                  <option value="" class="listeDeroulante">---Fabriquant---</option>
                  <?php
                     foreach($fabriquants as $fabriquant){// affiche la liste des sections de manière dynamique 
                        echo("<option value=" . $fabriquant["idFabriquant"] . ">" . $fabriquant["fabNom"] . "</option>");// sinon on met aucune valeur par défault
                     }
                  ?>
               </select>
               
               
               <select name="model" id="model">
                  <option value="" class="listeDeroulante">---Model---</option>
                  <?php
                        foreach($models as $model){// affiche la liste des sections de manière dynamique 
                           echo("<option value=" . $model["impModele"] . ">" . $model["impModele"] . "</option>");// sinon on met aucune valeur par défault
                        }
                        ?>
               </select>
                  <input type="submit" value="Submit">
            </form>
         </div>
      </header>
      <main>
         <?php
         foreach($printerList as $printer){
            echo("<div class='listImp'><h2>".$printer["impNom"]."</h2>");
            echo("<h3>".$printer["impModele"]."</h3><ul>");
            foreach($db->getOneFabriquand($printer["idFabriquant"]) as $id=>$value){
               if($id != "idFabriquant")
                  echo("<li><h4>".$value."</h4></li>");
            }
            echo("</ul><ul><li> Prix: ".$printer["impPrix"] . ".-</li>");
            echo("<li>Poids: ".$printer["impPoids"] . " Kg</li>");
            echo("<li>Hauteur: ".$printer["impHauteur"] . " cm</li>");
            echo("<li>Largeur: ".$printer["impLargeur"] . " cm</li>");
            echo("<li>Profondeur: ".$printer["impProfondeur"] . " cm</li>");
            echo("<li>Vitesse: ".$printer["impVitesse"] . "ppm</li>");
            echo("<li>Capaciter du Bac Papier:".$printer["impBacPapier"] . "pages</li>");
            echo("<li>Resolution Impression".$printer["impResolutionImpression"]."</li>");
            echo("<li>Resolution Numerisation".$printer["impResolutionNumerisation"]."</li></ul>");
            if($printer["impDisponibilite"] = 1){
               echo("<p>disponible</p>");
            }else{
               echo("<p>indisponible</p>");
            }
            echo("</div>");
         }

         ?>
      </main>
      <footer>
         <a href="p-form.php">formulaire</a>
      </footer>
   </body>
</html>