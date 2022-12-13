<?php
/**
 * Auteur : Morgan Dussault
 * Date : 14.11.22
 * Description : classe database
 */

include "config.php";// contien les nom pour le dpo

class Database {
     
     
     
     // attribut de classe
     private PDO $connector;
     /**
      * Constructeur
      */
      public function __construct(){
        $this->connector = new PDO('mysql:host=' . HOST .  ';dbname=' . DB_NAME . ';charset=utf8' , DB_USERNAME, 'root');
   }

   /**
    * prend les donnees de la table souhaitee
    */
   private function querySimpleExecute($query){
        $req = $this->connector->query($query);
        return $req;
   }
 
   //---------------- va chercher les donnée avec un prepare ----------------//
   private function queryPrepareExecute($query, $binds){
        $req = $this->connector->prepare($query);
        foreach ($binds as $key => $element){
             $req->bindValue($key, $element["value"],$element["type"]);
        }
        $req->execute();
        return $req;
   }



   
     // ---------------- retourne les donnees de la base sql pour qu'elles soient utilisablees ----------------//
   private function formatData($req){

        $result = $req->fetchALL(PDO::FETCH_ASSOC);
        return $result;
   }

   /**
    * TODO: à compléter
    */
   private function unsetData($req){

        $req->closeCursor();
   }




 // ---------------- retourne tout les imprimantes de la table t_imprimante ----------------//
   public function getImprimante($condition){

        $req = $this->querySimpleExecute('select * from t_imprimante WHERE' . $condition);
        $result = $this->formatData($req);
        return $result;
   }



 // ---------------- retourne tout les imprimantes de la table t_imprimante ----------------//
    public function priceFiltre($max,$min){
        $this->getImprimante("impPrix > $min AND impPrix < $max");
    }

     // ---------------- retourne tout les imprimantes de la table t_imprimante ----------------//
     public function nameFiltre($value){
          $this->getImprimante(" impModele LIKE '%".$value."%'");
     }
   


     // ---------------- retourne tout les profs de la table t_teacher ----------------//
   public function getAllFabriquand(){

        $req = $this->querySimpleExecute('select idFabriquant, fabNom from t_fabriquant');
        $result = $this->formatData($req);
        return $result;
   }

   //---------------- cherche toutes les données sur un prof ----------------//
   public function getOneTeacher($id){

          $req = $this->querySimpleExecute("select * from t_teacher where idTeacher = $id");
          $teacher = $this->formatData($req);
          if (count($teacher) === 1) {
               return $teacher[0];
          }
     }
     
     public function getAllModels(){
          $req = $this->querySimpleExecute("SELECT `impModele` FROM `t_imprimante` ORDER BY `impModele`");
          $result = $this->formatData($req);
          return $result;
     }
   


   public function createPrinter($Values){
     $binds = [];
     echo("<pre>");
/*

     var_dump($Values);
     echo("<pre>");
*/
          $test = 0;
          $binds["priceNow"] = array();
          $binds["priceNow"]["value"] = $Values["price"];
          $binds["priceNow"]["type"] = PDO::PARAM_INT;
     foreach($Values as $id => $value){
          $test++;
          $binds[$id] = array();
          $binds[$id]["value"] = $value;
          $binds[$id]["type"] = PDO::PARAM_STR_CHAR;
          
     }
     echo($test);
     $query = "INSERT INTO `t_imprimante`(`idImprimante`, `impHauteur`, `impLargeur`, `impProfondeur`, `impPoids`, `impModele`, `impNom`, `impVitesse`, `impRectoVerso`, `impBacPapier`, `impResolutionImpression`, `impResolutionNumerisation`, `impDisponibilite`, `impPrix`, `impPrixInitial`, `idFabriquant`) 
     VALUES (DEFAULT,:height,:with,:length,:weight,:model,:name,:speed,:recotverso,:papercapacity,:printSize,:scanSize,:disponibility,:priceNow,:price,:fabriquant)";
     $this->queryPrepareExecute($query, $binds);
}



}