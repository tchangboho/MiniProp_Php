<?php
$client = true;
include_once("header.php");
include_once("connexion.php");

// Vérification si le formulaire est soumis
if (!empty($_POST["inputnom"]) && !empty($_POST["inputville"]) && !empty($_POST["inputtelephone"])) {
    // Préparation de la requête d'insertion
    $query = "INSERT INTO client(nom, ville, telephone) VALUES (:nom, :ville, :telephone)";
    
    // Préparation et exécution de la requête
    $pdostmt = $pdo->prepare($query);
    $pdostmt->execute([
        "nom" => $_POST["inputnom"],
        "ville" => $_POST["inputville"],
        "telephone" => $_POST["inputtelephone"]
    ]);
    
    // Redirection vers la page des clients après l'insertion
    header("Location: clients.php");
    exit; // Arrêter l'exécution du script après la redirection
}

?>
<?php include_once("header.php"); ?>

<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Ajout d'un Client</h1>
        <form class="row g-3" method="POST">
            <div class="col-6">
                <label for="inputnom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="inputnom" placeholder="Soro" name="inputnom" required>
            </div>
            <div class="col-12">
                <label for="inputville" class="form-label">Ville</label>
                <input type="text" class="form-control" id="inputville" name="inputville" placeholder="Casablanca" required>
            </div>
            <div class="col-md-6">
                <label for="inputtelephone" class="form-label">Téléphone</label>
                <input type="text" class="form-control" name="inputtelephone" id="inputtelephone" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Soumettre</button>
            </div>
        </form>
    </div>
</main>

<?php include_once("footer.php"); ?>
