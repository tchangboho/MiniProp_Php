



<?php
  $clients = true;
  include_once("header.php");
  // include_once("main.php") Code normal au lieu de connexion.php
  include_once("connexion.php");

  if(!empty($_GET["id"])){
      
    $query = "UPDATE client SET (nom= :nom,ville=:ville,telephone=:telephone) where idclient = :id )"; 
    $pdostmt = $pdo->prepare($query);
    $pdostmt->execute(["nom"=>$_POST["inputnom"],"ville"=>$_POST["inputville"],"telephone"=>$_POST["inputtelephone"],"id"=>$_POST["myid"]]);
    //header("Location:clients.php");
    //$pdostmt->execute(["id"=>$_GET["id"]]);
}
  
  
  
  if(!empty($_GET["id"])){
      
    $query = "SELECT * FROM client where idclient = :id )"; 
    $pdostmt = $pdo->prepare($query);
    $pdostmt->execute(["id"=>$_GET["id"]]);
    while ($row=$pdostmt->fetch(PDO::FETCH_ASSOC)):
        
?>
<?php $pdo=new connect()?>

<!-- Begin page content -->

    <main class="flex-shrink-0">
            <div class="container">
                <h1 class="mt-5">Modifier un Client</h1>
                <?php $pdo=new connect()?> <!-- devrait etre dans main?php-->
        

                <form class="row g-3" method="POST">
                <!-- reccuperation du id selecionner par l'utilisateur afin de pouvoir continuer la 2ème requet-->
                <input type="hidden" name="myid" value="<?php echo $row["idclient"]?>"/> 

                <div class="col-6">
                    <label for="inputnom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="inputnom" placeholder="Soro" name="inputnom" value="<?php echo $row["nom"]?>" required>
                </div>

                <div class="col-12">
                    <label for="inputville" class="form-label">ville</label>
                    <input type="text" class="form-control" id="inputville" name="inputville" placeholder="Casablanca"  value="<?php echo $row["ville"]?>" required>
                </div>

                <div class="col-md-6">
                    <label for="inputtelephone" class="form-label">telephone</label>
                    <input type="text" class="form-control" name="inputtelephone" id="inputtelephone" value="<?php echo $row["telephone"]?>"  required>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </div>

                </form>
            </div>
    </main>
<?php
    endwhile;
    //$pdostmt->closeCursor(); 
    //header("Location:clients.php");
    }
    
?>

<?php 
    include_once("footer.php");
?>


