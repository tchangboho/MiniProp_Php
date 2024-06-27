





<?php
  $clients = true;
  include_once("header.php");
  // include_once("main.php") Code normal au lieu de connexion.php
  include_once("connexion.php");
  
  
  
  if(!empty($_POST["inputnom"])&&!empty($_POST["inputville"])&&!empty($_POST["inputtelephone"])){
      
    $query = "insert into client(nom,ville,telephone) values(:nom,:ville,:telephone)";
      
    $pdostmt = $pdo->prepare($query);
    $pdostmt->execute(["nom"=>$_POST["inputnom"],"ville"=>$_POST["inputville"],"telephone"=>$_POST["inputtelephone"]]);
    $pdostmt->closeCursor(); 
    header("Location:clients.php");
  }
        
?>









<!-- Begin page content -->

<main class="flex-shrink-0">
          <div class="container">
            <h1 class="mt-5">Ajout d'un Client</h1>
            <?php $pdo=new connect()?> <!-- devrait etre dans main?php-->
    

            <form class="row g-3" method="POST">

              <div class="col-6">
                <label for="inputnom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="inputnom" placeholder="Soro" name="inputnom" required>
              </div>

              <div class="col-12">
                <label for="inputville" class="form-label">ville</label>
                <input type="text" class="form-control" id="inputville" name="inputville" placeholder="Casablanca" required>
              </div>

              <div class="col-md-6">
                <label for="inputtelephone" class="form-label">telephone</label>
                <input type="text" class="form-control" name="inputtelephone" id="inputtelephone" required>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary">Soumettre</button>
              </div>

            </form>
          </div>
</main>

<?php 
    include_once("footer.php");
?>

<!--


    <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="password" class="form-control" id="inputPassword4" name="inputPassword4">
  </div>

    <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" id="inputEmail4" name="nputEmail4">
  </div>

    <div class="col-md-4">
    <label for="inputState" class="form-label">State</label>
    <select id="inputState" class="form-select">
      <option selected>Choose...</option>
      <option>...</option>
    </select>
  </div>

    <div class="col-md-2">
    <label for="inputZip" class="form-label">Zip</label>
    <input type="text" class="form-control" id="inputZip">
  </div>
  
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>

  
-->
