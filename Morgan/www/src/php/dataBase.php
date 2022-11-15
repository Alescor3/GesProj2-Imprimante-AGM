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

        $req = $this->querySimpleExecute('select * from t_imprimante Where' . $condition);
        $result = $this->formatData($req);
        return $result;
   }



 // ---------------- retourne tout les imprimantes de la table t_imprimante ----------------//
    public function priceFiltre($max,$min){
        $this->getImprimante("impPrix > $min AND impPrix < $max");
    }


   


     // ---------------- retourne tout les profs de la table t_teacher ----------------//
   public function getAllFabrquand(){

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

   //---------------- supprime un prof ----------------//
   public function deletTeacher($id){
     $req = $this->querySimpleExecute("DELETE FROM `t_teacher` WHERE idTeacher = $id");
   }

   //---------------- trouve la section d'un prof ----------------//
   public function getTeacherSection($id){

          $req = $this->querySimpleExecute("SELECT fkSection FROM t_teacher WHERE idTeacher = $id LIMIT 1");

          $fkSection = $this->formatData($req);

          $idSection = (int)$fkSection[0]["fkSection"];

          $req = $this->querySimpleExecute("SELECT secName FROM t_section WHERE idSection = $idSection");

          $fkSection = $this->formatData($req);

          return $fkSection[0];

     }

     //---------------- création d'un prof ----------------//
    public function createTeacher($Values){

     $binds = [];

     foreach($Values as $id => $value){
          if ($id === "type" || $id === "btnSubmit" || $id === "idTeacher") {
               continue;
          }
          $binds[$id] = array();
          $binds[$id]["value"] = $value;

          if($id == "gender"){
               $binds[$id]["type"] = PDO::PARAM_STR_CHAR;
          }else if ($id == "idTeacher" || $id == "section"){
               $binds[$id]["type"] = PDO::PARAM_INT;
          }else {
               $binds[$id]["type"] = PDO::PARAM_STR;
          }
     }

     $query = "INSERT INTO `t_teacher`(`idTeacher`, `teaFirstname`, `teaName`, `teaGender`, `teaNickname`, `teaOrigine`, `fkSection`) 
     VALUES (DEFAULT, :name, :firstname, :gender, :surname, :origin, :section)";

     $this->queryPrepareExecute($query, $binds);
     
}

     //---------------- mise a jour d'un prof ----------------//
     public function UpdateTeacher($Values){
          $binds = [];

          foreach($Values as $id => $value){
               if ($id === "type" || $id === "btnSubmit" || $id === "idTeacher") {
                    continue;
               }
               $binds[$id] = array();
               $binds[$id]["value"] = $value;

               if($id == "gender"){
                    $binds[$id]["type"] = PDO::PARAM_STR_CHAR;
               }else if ($id == "idTeacher" || $id == "section"){
                    $binds[$id]["type"] = PDO::PARAM_INT;
               }else {
                    $binds[$id]["type"] = PDO::PARAM_STR;
               }
          }

          $query = "UPDATE `t_teacher` SET `teaFirstname`= :name ,`teaName`= :firstname ,`teaGender`=:gender,`teaNickname`= :surname ,`teaOrigine`= :origin ,`fkSection`= :section 
          WHERE idTeacher = " .  $Values['idTeacher'] . "";


          $req = $this->queryPrepareExecute($query, $binds);
     }

     //---------------- retourne toutes les sections ----------------//
     public function getAllSection(){
          $req = $this->querySimpleExecute("SELECT * FROM `t_section`");
          $section = $this->formatData($req);
          return $section;
     }

 
 
     // ---------------- retourne tout les users ----------------//
     public function getAllUser(){

          $req = $this->querySimpleExecute("SELECT * FROM `t_user`");
          $section = $this->formatData($req);
          return $section;
     }


}