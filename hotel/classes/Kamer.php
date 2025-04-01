<?php
class Kamer {
    private $conn;
    public function __construct($db) {
        $this->conn = $db;
    }
    //selecteert alle kamers in de tabel
    public function getAllRooms() {
        $query = "SELECT * FROM Kamer";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //het checkt of er kamers beschikbaar zijn
    public function checkAvailability($date) {
        $query = "SELECT COUNT(*) as available FROM Kamer WHERE kamer_id NOT IN (SELECT kamer_id FROM Reservering WHERE :date BETWEEN check_in AND check_out)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":date", $date);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['available'];
    }
}
?>