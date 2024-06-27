
<!-- Connexion a une base de donnée

<?php
    class connect extends PDO{
        const HOST="localhost";
        const DB ="gestioncommandes";
        const USER ="root";
        const PSW ="";


        public function __construct(){
            try {
                //code...
                parent::__construct("mysql:dbname=".self::DB.";host=".self::HOST,self::USER,self::PSW);
                echo "DONE bonne connexion";
            }catch(PDOException $e){
                //throw $th;
                echo $e->getMessage()." ".$e->getFile()." ".$e->getLine();
            }
        }
    }
    
?>

