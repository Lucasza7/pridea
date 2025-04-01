<?php

class Reservering {
    private $conn;
    public function __construct($db) {
        $this->conn = $db;
    }
    public function create($naam, $kamer_id, $check_in, $check_out) {
        // Eerst een nieuwe klant aanmaken
        $query = "INSERT INTO Klant (naam, email, telefoonnummer) VALUES (:naam, :email, :telefoonnummer)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":naam", $naam);
        $dummy_email = $naam . "_" . time() . "@placeholder.com"; // Unieke dummy email
        $stmt->bindParam(":email", $dummy_email);
        $telefoonnummer = ""; // Leeg telefoonnummer
        $stmt->bindParam(":telefoonnummer", $telefoonnummer);
        $stmt->execute();
        
        // Het ID van de zojuist aangemaakte klant ophalen
        $klant_id = $this->conn->lastInsertId();
        
        // Nu de reservering aanmaken
        $query = "INSERT INTO Reservering (klant_id, kamer_id, check_in, check_out) VALUES (:klant_id, :kamer_id, :check_in, :check_out)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":klant_id", $klant_id);
        $stmt->bindParam(":kamer_id", $kamer_id);
        $stmt->bindParam(":check_in", $check_in);
        $stmt->bindParam(":check_out", $check_out);
        return $stmt->execute();
    }
    //een overzicht van alle reserveringen
    public function getReservations() {
        $query = "SELECT * FROM Reservering";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //dit update de reservering informatie en ook in de database
    public function update($id, $check_in, $check_out, $klant_id, $type) {
        $query = "UPDATE Reservering SET check_in = :check_in, check_out = :check_out, klant_id = :klant_id WHERE reservering_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":check_in", $check_in);
        $stmt->bindParam(":check_out", $check_out);
        $stmt->bindParam(":klant_id", $klant_id);
        return $stmt->execute();
    }
    //dit verwijdert de reservering uit de database door reservering_id
    public function delete($id) {
        $query = "DELETE FROM Reservering WHERE reservering_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}

?>