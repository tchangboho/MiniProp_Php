<?php
class Connect extends PDO{
    const HOST="localhost";
    const DB ="gestioncommandes";
    const USER ="postgres"; // Utilisateur PostgreSQL
    const PSW ="votre_mot_de_passe"; // Mot de passe PostgreSQL

    public function __construct(){
        try {
            //code...
            parent::__construct("pgsql:host=".self::HOST.";dbname=".self::DB,self::USER,self::PSW);
            echo "DONE bonne connexion";
        }catch(PDOException $e){
            //throw $th;
            echo $e->getMessage()." ".$e->getFile()." ".$e->getLine();
        }
    }
}

?>
