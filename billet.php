
<?php
class billet{
    private $connexion;
    private $prix;
    private $statut;
    private $destination;
    private $date_reservation;
    private $heure_reservation;

    public function __construct($connexion, $prix, $statut, $destination, $date_reservation, $heure_reservation) {
        $this->connexion = $connexion;
        $this->prix = $prix;
        $this->statut = $statut;
        $this->destination = $destination;
        $this->date_reservation = $date_reservation;
        $this->heure_reservation = $heure_reservation;
    }

    public function getprix(){
       return $this->prix;
    }

    public function setprix($new_prix){
        $this->prix = $new_prix;
    }

    public function getstatut(){
        return $this->statut;
     }

     public function setstatut($new_statut){
         $this->statut = $new_statut;
     }

     public function getdestination(){
        return $this->destination;
     }

     public function setdestination($new_destination){
         $this->destination = $new_destination;
     }

     public function getdate_reservation(){
        return $this->date_reservation;
     }

     public function setdate_reservation($new_date_reservation){
         $this->date_reservation = $new_date_reservation;
     }

     public function getheure_reservation(){
        return $this->heure_reservation;
     }

     public function setheure_reservation($new_heure_reservation){
         $this->heure_reservation = $new_heure_reservation;
     }

    //  fonction pour ajouter des billets
    public function add(){
        try{
            $sql="INSERT INTO billet(prix, statut, destination, date_reservation, heure_reservation) VALUES(:prix, :statut, :destination, :date_reservation, :heure_reservation)";
            $stmt = $this->connexion->prepare($sql);
            $stmt->bindParam(':prix', $this->prix, PDO::PARAM_STR);
            $stmt->bindParam(':statut', $this->statut, PDO::PARAM_STR);
            $stmt->bindParam(':destination', $this->destination, PDO::PARAM_STR);
            $stmt->bindParam(':date_reservation', $this->date_reservation, PDO::PARAM_STR);
            $stmt->bindParam(':heure_reservation', $this->heure_reservation, PDO::PARAM_STR);
            $resultats = $stmt->execute();
            if ($resultats) {
                header("location: liste.php");
                exit();
            } else {
                die("Erreur : Impossible d'insérer des données.");
            }
        } catch (PDOException $e) {
            die("Erreur : Impossible d'insérer des données " . $e->getMessage());
        }
    }

    public function read(){
        try{
            $sql="SELECT * FROM billet";
        // preaparation de la requete
        $stmt=$this->connexion->prepare($sql);
        // execution de la requete
        $stmt->execute();
        // recuperation des elements dans un tableau
        $resultats=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultats;
    
    
        }
        
        catch(PDOException $e){
            die("erreur:impossible d'afficher les elements" .$e->getMessage());
        }
    }

    public function delete($id) {
        try {
            // Requête SQL pour supprimer le membre avec l'ID donné
            $sql = "DELETE FROM billet WHERE id = :id";
            // Préparation de la requête
            $stmt = $this->connexion->prepare($sql);
            // Liaison de la valeur du paramètre ID
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            // Exécution de la requête
            $stmt->execute();
            // Redirection vers la page index après la suppression
            header("location: liste.php");
            exit(); // Arrêt du script après la redirection
        } catch(PDOException $e) {
            // Gestion de l'erreur en cas d'échec de la suppression
            die("Erreur : Impossible de supprimer le membre : " . $e->getMessage());
        }
    }


    public function update($id, $prix, $statut, $destination, $date_reservation, $heure_reservation){
        try{
            // requete sql pour modifier
            $sql = "UPDATE billet SET prix = :prix, statut = :statut, destination = :destination, date_reservation = :date_reservation, heure_reservation = :heure_reservation WHERE id = :id";
            // preparer la requete
            $stmt = $this->connexion->prepare($sql);
            // faire les liaisons des valeurs aux parametres
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':prix', $prix, PDO::PARAM_STR);
            $stmt->bindParam(':statut', $statut, PDO::PARAM_STR);
            $stmt->bindParam(':destination', $destination, PDO::PARAM_STR);
            $stmt->bindParam(':date_reservation', $date_reservation, PDO::PARAM_STR);
            $stmt->bindParam(':heure_reservation', $heure_reservation, PDO::PARAM_STR);
            $stmt->execute();
            //  rediriger la pdestination
            header("location: liste.php");
            exit(); // Terminer le script après la redirection
        } catch(PDOException $e){
            die("Erreur : Impossible de mettre à jour les données : " . $e->getMessage());
        }
}}
?>

