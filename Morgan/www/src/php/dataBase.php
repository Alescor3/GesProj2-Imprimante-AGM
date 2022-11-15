<?php
/**
 * 
 * TODO : � compl�ter
 * 
 * Auteur : Dussault Morgan
 * Date : 03.10.2022
 * Description : page servant a chercher les données dans la base de donée
 */
 class Database {


    // Variable de classe
    private PDO $connector;


    /**
     * TODO: � compl�ter
     */
    public function __construct(){

        // TODO: Se connecter via PDO et utilise la variable de classe $connector
        $this->connector = new PDO('mysql:host=localhost;dbname=db_imprimante;charset=utf8', 'root', 'root');
    }

    /**
     * TODO: � compl�ter
     */ 
    private function querySimpleExecute($query){

        $req = $this->connector->query($query);
        return $req;
    }

    private function prepareSimpleExecute($query){

        $req = $this->connector->query($query);
        return $req;
    }

 }


?>