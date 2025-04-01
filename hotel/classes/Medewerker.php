<?php
class Medewerker {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function login($gebruikersnaam, $wachtwoord) {
        // Query om medewerker te zoeken op gebruikersnaam
        $query = "SELECT medewerker_id, naam, gebruikersnaam, wachtwoord 
                 FROM Medewerker 
                 WHERE gebruikersnaam = :gebruikersnaam";

        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":gebruikersnaam", $gebruikersnaam);
            $stmt->execute();

            $medewerker = $stmt->fetch(PDO::FETCH_ASSOC);

            // Controleer of medewerker bestaat en wachtwoord klopt
            if ($medewerker && password_verify($wachtwoord, $medewerker['wachtwoord'])) {
                // Start sessie en sla medewerker gegevens op
                session_start();
                $_SESSION['medewerker_id'] = $medewerker['medewerker_id'];
                $_SESSION['naam'] = $medewerker['naam'];
                return true;
            }
            return false;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function createMedewerker($naam, $gebruikersnaam, $wachtwoord) {
        // SQL query om nieuwe medewerker toe te voegen
        $query = "INSERT INTO Medewerker (naam, gebruikersnaam, wachtwoord) 
                 VALUES (:naam, :gebruikersnaam, :wachtwoord)";
                 
        try {
            // Hash het wachtwoord voor veilige opslag
            $hashed_wachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);
            
            // Bereid de query voor en bind de parameters
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":naam", $naam);
            $stmt->bindParam(":gebruikersnaam", $gebruikersnaam);
            $stmt->bindParam(":wachtwoord", $hashed_wachtwoord);
            
            // Voer de query uit en geef het resultaat terug
            return $stmt->execute();
        } catch (PDOException $e) {
            // Bij database fouten, geef false terug
            return false;
        }
    }
}
?> 