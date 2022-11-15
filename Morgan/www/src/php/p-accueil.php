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
$fabriquants = $db->getAllFabrquand();
$testNom = $db->nameFiltre("a");

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
      <!-- PRIX
         les deux champ dans une div avec des borders noir et les champs sans avec un tiret entre les deux 
         en mode c'est 1 seul champ mais non et a gauche le prix minimum et a droit le prix max
         genr:
         <div class="???">
      -->
      <label>PRIX</label>
      <input type='text' name='priceMinValue' id='minValue' placeholder="Min">
      <input type='text' name='priceMaxValue' id='maxValue'placeholder="Max">
      <!-- 
         </div>
      -->
      <br>
      <!-- HAUTEUR
         les deux champ dans une div avec des borders noir et les champs sans avec un tiret entre les deux 
         en mode c'est 1 seul champ mais non et a gauche le prix minimum et a droit le prix max
         genr:
         <div class="???">
      -->
      <label>HAUTEUR</label>
      <input type='text' name='hightMinValue' id='minValue' placeholder="Min">
      <input type='text' name='hightMaxValue' id='maxValue'placeholder="Max">
      <!-- 
         </div>
      -->
      <br>
      <!-- LARGEUR
         les deux champ dans une div avec des borders noir et les champs sans avec un tiret entre les deux 
         en mode c'est 1 seul champ mais non et a gauche le prix minimum et a droit le prix max
         genr:
         <div class="???">
      -->
      <label>LARGEUR</label>
      <input type='text' name='withMinValue' id='minValue' placeholder="Min">
      <input type='text' name='witheMaxValue' id='maxValue'placeholder="Max">
      <!-- 
         </div>
      -->
      <br>
      <!-- PROFONDEUR
         les deux champ dans une div avec des borders noir et les champs sans avec un tiret entre les deux 
         en mode c'est 1 seul champ mais non et a gauche le prix minimum et a droit le prix max
         genr:
         <div class="???">
      -->
      <label>PROFONDEUR</label>
      <input type='text' name='depthMinValue' id='minValue' placeholder="Min">
      <input type='text' name='depthMaxValue' id='maxValue'placeholder="Max">
      <!-- 
         </div>
      -->
      <br>
      <select name="section" id="section">
            <option value="" class="listeDeroulante">---Fabriquant---</option>
            <?php
               foreach($fabriquants as $fabriquant){// affiche la liste des sections de manière dynamique 
                  echo("<option value=" . $fabriquant["idFabriquant"] . ">" . $fabriquant["fabNom"] . "</option>");// sinon on met aucune valeur par défault
               }
            ?>
      </select>

      </form>
   </div>


<?php
echo($testNom);