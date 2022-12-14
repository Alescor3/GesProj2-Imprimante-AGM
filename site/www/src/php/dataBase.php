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
   public function getOneFabriquand($id){

          $req = $this->querySimpleExecute("select * from t_fabriquant where idFabriquant = $id");
          $builder = $this->formatData($req);
          if (count($builder) === 1) {
               return $builder[0];
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
     echo(count($binds));
     $query = "INSERT INTO `t_imprimante`(`idImprimante`, `impHauteur`, `impLargeur`, `impProfondeur`, `impPoids`, `impModele`, `impNom`, `impVitesse`, `impRectoVerso`, `impBacPapier`, `impResolutionImpression`, `impResolutionNumerisation`, `impDisponibilite`, `impPrix`, `impPrixInitial`, `idFabriquant`) 
     VALUES (DEFAULT,:height,:with,:length,:weight,:model,:name,:speed,:recotverso,:papercapacity,:printSize,:scanSize,1,:priceNow,:price,:fabriquant)";
     $this->queryPrepareExecute($query, $binds);
     }
     public function getAllImprimante(){

          $req = $this->querySimpleExecute('select * from t_imprimante');
          $result = $this->formatData($req);
          return $result;
     }
  

     public function GetPrinterWithFiltre($filtre){

          $value = 0;
          $binds = [];
          $query = ("SELECT * FROM `t_imprimante` WHERE");
          foreach($filtre as $id => $type){

                    
                    $binds[$id] = array();
                    $binds[$id]["value"] = $type;
                    if($value >= 1){
                         $query .= " AND ";
                    }
                    if($type != ""){
                         echo($type . "<br>");

                         switch($id){
                              case "model":
                                   $query .="`impModele` =:model";
                                   $value ++;
                                   break;
                              case "prixMax":
                                   if($filtre["prixMin"] === "max"){
                                        $query .="`impPrix` <= MAX(`impPrix`)";
                                        unset($binds[$id])
                                   }
                                   else{
                                        $query .="`impPrix` <= :prixMax AND `impPrix` >= :prixMin";
                                   }
                                   $value ++;
                                   break;
                              case "hauteur":
                                   $query .="`impHauteur` <= :hauteur";
                                   $value ++;
                              break;              
                              case "largeur":
                                   $query .="`impLargeur` <= :largeur";
                                   $value ++;
                                   break;
                              case "profondeur":
                                   $query .="`impHauteur` <= :profondeur";
                                   $value ++;
                                   break;                                                          
                              }
                              if($id == "prixMax" ||$id == "hauteur" ||$id == "longeur" ||$id == "profondeur" || $id == "prixMin")
                                   $binds[$id]["type"] = PDO::PARAM_INT;
                              else
                              $binds[$id]["type"] = PDO::PARAM_INT;

                    }
               }

          $req = $this->queryPrepareExecute($query, $binds);
          $result = $this->formatData($req);

          return $result;

     }



}
