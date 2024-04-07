
<?php
include_once "config.php";
if(isset($_POST['soumetre'])){
    $prix=$_POST['prix'];
    $statut=$_POST['statut'];
    $destination=$_POST['destination'];
    $date_reservation=$_POST['date_reservation']; 
    $heure_reservation=$_POST['heure_reservation'];
    
    // recuperation de l'id
    $id = $_GET['id'];

    // Appeler la méthode update avec les nouvelles valeurs
    $billet->update($id, $prix, $statut, $destination, $date_reservation, $heure_reservation);

    // Rediriger vers la page index
    header("location: idex.php");
    exit(); // Terminer le script après la redirection
}

// Récupérer les données de l'étudiant à mettre à jour
$id = $_GET['id'];

if(isset($id)) {
    try {
        // Requête SQL pour sélectionner les données de l'étudiant à mettre à jour
        $sql = "SELECT * FROM billet WHERE id = :id";
        $stmt = $connexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            // Récupération des données de l'étudiant
            $billet = $stmt->fetch(PDO::FETCH_ASSOC);
            $prix = $billet['prix'];
            $statut = $billet['statut'];
            $destination= $billet['destination'];
            $date_reservation= $billet['date_reservation'];
            $heure_reservation = $billet['heure_reservation'];
        } else {
            echo "Erreur lors de la récupération des données.";
        }
    } catch(PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
} else {
    echo "ID non spécifié.";
}


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application de reservation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <div class="logo">
         <img src="voyage.png" alt=""> 
    </div>
    <nav>
        <a href="billet.php">ADD BILLET</a>
        <a href="liste.php">LIST_BILLET</a> 
    </nav>
  </header> 
  <h1>AJOUT DE BILLET</h1>

  <form action="" method="post">
  <img src="reservation.png" alt="">
     <fieldset>    
        <div class="remplir_formulaire">
            <label for="prix">quelle est le prix du billet</label>
            <input type="number" name="prix" value="<?php echo $prix?>">
        </div>
        <div class= "remplir_formulaire">
            <label for="statut">quelle est le statut du billet?</label>
            <input type="text" name="statut" value="<?php echo $statut?>">   
        </div>
        <div class="remplir_formulaire">
            <label for="destination">quelle est la destination ?</label>
            <input type="text" name="destination" value="<?php echo $destination?>">
        </div>
        <div>
        <div class="remplir_formulaire">
            <label for="date_reservation">Quelle est la date de reservation?</label>
            <input type="date" name="date_reservation" value="<?php echo $date_reservation?>">
        </div>
        <div class="remplir_formulaire">
            <label for="heure_rservation">Quelle est l'heure de la reservation?</label>
            <input type="time" name="heure_reservation" value="<?php echo $heure_reservation?>">
        </div>
        <input type="submit" value="Soumettre" name="soumetre" id="bouton">
    </fieldset> 
  </form>
</body>
</html>