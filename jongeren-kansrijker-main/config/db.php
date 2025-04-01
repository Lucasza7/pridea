<?php
   class DB {
    private $pdo;
    protected $stmt;

    public function __construct($db, $host = "localhost", $port = "3306", $user = "root", $pass = "") {
        try {
            $this->pdo = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // throw new Exception("Database connection error: " . $e->getMessage());
            echo "$host, $port, $db, $user, $pass";
        }
    }

    public function getPDO() {
        return $this->pdo;
    }

    public function exec($sql, $placeholders = null) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($placeholders);
        return $stmt;
    }

    public function read($fields, $table, $conditions, $values) {
        $sql = "SELECT $fields FROM $table WHERE $conditions";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($values);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // New prepare method
    public function prepare($sql) {
        return $this->pdo->prepare($sql);
    }
}


$myDb = new DB('Jongereninstituut');


