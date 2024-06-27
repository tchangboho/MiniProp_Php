<?php
// include_ once("main.php") normalement pas connexion.php
include_once("connexion.php");

if(!empty($_GET["id"])){
    $query = "delete from client where idclient =:id";
    $objstmt=$pdo->prepare($query);
    $objstmt->execute(["id"=>$_GET["id"]]);
    $objstmt->closeCursor();
    header("Location:clients.php");
  
}
    
?>
