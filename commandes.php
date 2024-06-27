



<?php
    $commandes = true;
    include_once("header.php");
    include_once("connexion.php");
    include_once("main.php");
?>

<!-- Begin page content -->
<main class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5">Commandes</h1>
    <?php $pdo=new connect()?>

    // insertion de la datatable dans class_implements

    <table id="datatable" class="display">
    <thead>
        <tr>
            <th></th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>
    
  </div>
</main>

<?php 
    include_once("footer.php");
?>
