







<?php
    $clients = true;
    include_once("header.php");
    include_once("main.php");


    $count =0;
?>

<!-- Begin page content -->
<!--<main class="flex-shrink-0">
  <div class="container">-->
  <main class="flex-shrink-0">
  <div class="container">
  <?php 
    include_once("connexion.php");
    $pdo=new connect()
  ?>
  
        <h1 class="mt-5">Clients</h1>
        <!-- Btn d'ajout de client -->
        <a href="addclient_2.php" class="btn btn-primary" style="float:right;margin-botton:20px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"/>
            </svg>
        </a>

    

        <?php 
        /* Affichage de l'ensemble des clients dans la base de données clients
        On va declarer une variable qui va contenir l'ensembles des clients de la table client ( requete pl/sql) 
        */
            $query = "select * from client";
            $pdostmt = $pdo->prepare($query);
            $pdostmt->execute();
            //$resultat = $pdostmt->fetchAll(PDO::FETCH_ASSOC);
            //var_dump($resultat)
        ?>

    // insertion de la datatable dans class_implements

        <table id="datatable" class="display">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOM</th>
                            <th>Ville</th>
                            <th>TELEPHONE</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>

                    <tbody>
                        <!-- <?php foreach ($resultat as $row) :?>
                        <tr>
                            <td><?= $row['id']?></td>
                            <td><?= $row['nom']?></td>
                            <td><?= $row['ville']?></td>
                            <td><?= $row['telephone']?></td>
                        </tr> <?php endforeach;?>
                        -->
                        <!-- Affichage cdes données de la table -->
                        <!-- on va parcourir chaque ligne de la table -->
                        <?php while ($ligne = $pdostmt->fetch(PDO::FETCH_ASSOC)):
                                    $count++;
                            ?>
                            <tr>
                                <td><?php echo $ligne["idclient"]; ?></td>
                                <td><?php echo $ligne["nom"]; ?></td>
                                <td><?php echo $ligne["ville"]; ?></td>
                                <td><?php echo $ligne["telephone"]; ?></td>
                                <td>
                                    <!-- Bouton de modification -->
                                    <a href="modifClient.php?id=<?php echo $ligne["idclient"]?>" class="btn btn-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                                        </svg>
                                    </a>
                                    <!-- Btn de Suppression -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletemodal<?php echo $count?>" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                                        </svg>
                                    
                                    </boutton>
                                </td>
                            </tr>
                            <!-- Boutton modal -->

                                <!-- Modal -->
                                <div class="modal fade" id="deletemodal<?php echo $count?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"> Supression ?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Voulez-Vous vraiment supprimer ce client?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                        <a href="delete.php?id=<?php echo $ligne["idclient"]?>" class="btn btn-danger">Supprimer</a>
                                    </div>
                                    </div>
                                </div>
                                </div>

                        <?php endwhile; ?>
                    
                    </tbody>
        </table>
    
  </div>
</main>

<?php 
    include_once("footer.php");
?>


















