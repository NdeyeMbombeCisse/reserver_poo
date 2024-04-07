
<?php
include_once "config.php";
include_once "billet.php";
if(isset($_POST['soumetre'])){
    $prix=$_POST['prix'];
    $statut=$_POST['statut'];
    $destination=$_POST['destination'];
    $date_reservation=$_POST['date_reservation']; 
    $heure_reservation=$_POST['heure_reservation'];
   
    // recuperation de l'id
    $id = $_GET['id'];
    // appeler la methode update
    $billet->add($id, $prix, $statut, $destination, $date_reservation, $heure_reservation);

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
            <input type="number" name="prix">
        </div>
        <div class= "remplir_formulaire">
            <label for="statut">quelle est le statut du billet?</label>
            <input type="text" name="statut">   
        </div>
        <div class="remplir_formulaire">
            <label for="destination">quelle est la destination ?</label>
            <input type="text" name="destination">
        </div>
        <div>
        <div class="remplir_formulaire">
            <label for="date_reservation">Quelle est la date de reservation?</label>
            <input type="date" name="date_reservation">
        </div>
        <div class="remplir_formulaire">
            <label for="heure_rservation">Quelle est l'heure de la reservation?</label>
            <input type="time" name="heure_reservation">
        </div>
        <input type="submit" value="Soumettre" name="soumetre" id="bouton">
    </fieldset> 
  </form>
</body>
</html>