<?php
include_once "billet.php";
// création des constantes pour les informations de la base de données
define("DB_SERVER", "localhost");
define("USER_NAME", "root");
define("DB_PASSWORD", "Mbombe@78400$");
define("DB_NAME", "reservation");

// connexion avec la base de données
try {
    $connexion = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, USER_NAME, DB_PASSWORD);
    // Configuration de PDO pour afficher les erreurs SQL
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $billet = new billet($connexion, 100, "annuler", "zig","2002/11/13", "18:00", );
   
} 
// affichage d'un message en cas d'erreur
catch (PDOException $e) {
    die("Erreur :: Impossible de se connecter à la base de données : " . $e->getMessage());
}
?>