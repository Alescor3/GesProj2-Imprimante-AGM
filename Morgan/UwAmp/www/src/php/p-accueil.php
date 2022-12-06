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


/*
echo("<pre>");
var_dump($_SESSION);
echo("<pre>");
*/
?>
<!DOCTYPE html>
<html lang="fr">
<link rel="stylesheet" href="../../resources/css/totalStyle.css">
   
   
   <h2>Liste imprimante</h2>
   <div class="title">

      <form action="filtres.php" method="post">

         <select name="prixMax" id="prixMax">
            <option value="" class="listeDeroulante">---Prix Max---</option>
            <option value="0" class="listeDeroulante"> 0 - 200.- </option>
            <option value="200" class="listeDeroulante"> 200 - 500.- </option>
            <option value="500" class="listeDeroulante"> 500 - 1000.- </option>
            <option value="1000" class="listeDeroulante"> 1000 - 2000.- </option>
            <option value="2000" class="listeDeroulante"> 2000.- + </option>
         </select>

         <br>

         <select name="hauteur" id="hauteur">
            <option value="" class="listeDeroulante">---Hauteur---</option>
            <option value="0" class="listeDeroulante"> 0 - 25cm </option>
            <option value="25" class="listeDeroulante"> 25 - 50cm </option>
            <option value="50" class="listeDeroulante"> 50 - 75cm </option>
            <option value="75" class="listeDeroulante"> 75 - 100cm </option>
            <option value="100" class="listeDeroulante"> 100cm + </option>
         </select>

         <select name="longeur" id="longeur">
            <option value="" class="listeDeroulante">---Longeur---</option>
            <option value="0" class="listeDeroulante"> 0 - 25cm </option>
            <option value="25" class="listeDeroulante"> 25 - 50cm </option>
            <option value="50" class="listeDeroulante"> 50 - 75cm </option>
            <option value="75" class="listeDeroulante"> 75 - 100cm </option>
            <option value="100" class="listeDeroulante"> 100cm + </option>
         </select>

         <select name="profondeur" id="profondeur">
            <option value="" class="listeDeroulante">---Profondeur---</option>
            <option value="0" class="listeDeroulante"> 0 - 25cm </option>
            <option value="25" class="listeDeroulante"> 25 - 50cm </option>
            <option value="50" class="listeDeroulante"> 50 - 75cm </option>
            <option value="75" class="listeDeroulante"> 75 - 100cm </option>
            <option value="100" class="listeDeroulante"> 100cm + </option>
         </select>

         <br>

         <label for="disponibilite">Seulement disponible</label>
         <input type="checkbox" id="disponibilite" name="disponibilite">


      <!-- 
         </div>
      -->
      <br>
      <select name="fabriquant" id="fabriquant">
            <option value="" class="listeDeroulante">---Fabriquant---</option>
            <?php
               foreach($fabriquants as $fabriquant){// affiche la liste des sections de manière dynamique 
                  echo("<option value=" . $fabriquant["idFabriquant"] . ">" . $fabriquant["fabNom"] . "</option>");// sinon on met aucune valeur par défault
               }
            ?>
      </select>

      <br>

      <select name="model" id="model">
            <option value="" class="listeDeroulante">---Model---</option>
            <?php
               foreach($models as $model){// affiche la liste des sections de manière dynamique 
                  echo("<option value=" . $model["impModele"] . ">" . $model["impModele"] . "</option>");// sinon on met aucune valeur par défault
               }
            ?>
      </select>
      <br>
      <input type="submit" value="Submit">
      </form>
   </div>


<?php
/*
echo("<pre>");
var_dump($models);
echo("</pre>");
*/
//<a href="filtres.php">retour menu</a>
$_SESSION["form"] = 1;
?>
<html>
<a href="form.php">formulaire</a>

</html>