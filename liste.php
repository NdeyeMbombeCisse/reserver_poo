
<?php
// inclure le fichier de configuration
require_once "config.php";
// Récupérer les données des membres depuis la base de données
$resultats = $billet->read();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>membre patte d'oie</title>
    <link rel="stylesheet" href="style.css">  
</head>
<body>
<header>
    <nav>
    <a href="index.php">ADD BILLET</a>
        <a href="liste.php">LIST_BILLET</a> 

    </nav>
  </header> 
  <h1>LISTE DES billets</h1>
<table>
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">PRIX</th>
            <th scope="col">STATUT</th>
            <th scope="col">DESTINATION</th>
            <th scope="col">DATE RESERVATION</th>
            <th scope="col">HEURE RESERVATION</th>
            <th scope="col">MODIFIER</th>
            <th scope="col">SUPPRIMER</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($resultats as $billet) { ?>
            <!-- Affichage des données dans les lignes du tableau -->
            <tr class="trow">
                <td><?php echo $billet['id']; ?></td>
                <td><?php echo $billet['prix']; ?></td>
                <td><?php echo $billet['statut']; ?></td>
                <td><?php echo $billet['destination']; ?></td>
                <td><?php echo $billet['date_reservation']; ?></td>
                <td><?php echo $billet['heure_reservation']; ?></td>
                <!-- Bouton pour éditer les données avec un lien vers updatedata.php -->
                <td><a href="update.php?id=<?php echo $billet['id']; ?>">Edit</a></td>
                <!-- Bouton pour supprimer les données avec un lien vers deletedata.php -->
                <td><a href="delete.php?id=<?php echo $billet['id']; ?>">Delete</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>