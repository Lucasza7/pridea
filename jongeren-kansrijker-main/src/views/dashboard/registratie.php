<?php

session_start(); // Start een sessie om gegevens op te slaan

require_once '../../../config/db.php'; // Verbind met de databaseklasse

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Haal gegevens op van het formulier
    $name = isset($_POST["name"]) ? trim($_POST["name"]) : '';
    $surname = isset($_POST["surname"]) ? trim($_POST["surname"]) : '';
    $email = isset($_POST["email"]) ? trim($_POST["email"]) : '';
    $password = isset($_POST["password"]) ? $_POST["password"] : '';

    // Valideer de invoer
    if (empty($name) || empty($surname) || empty($email) || empty($password)) {
        echo "Alle velden zijn verplicht.";
        exit;
    }

    // Hash het wachtwoord voor veiligheid
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Zet de huidige datum en tijd voor created_at en updated_at
    $created_at = date('Y-m-d H:i:s'); 
    $updated_at = $created_at;

    // Maak verbinding met de database en voer de INSERT-query uit
    try {
        $myDb = new DB('jongereninstituut'); // Zorg dat de juiste database gebruikt wordt

        // Gebruik de `exec`-methode van de databaseklasse om de gegevens in te voegen
        $sql = "INSERT INTO medewerkers (name, surname, email, password, created_at, updated_at) VALUES (?,?,?,?,?,?)";
        $resultaat = $myDb->exec($sql, [$name, $surname, $email, $hashed_password, $created_at, $updated_at]);

        if ($resultaat) {
            // Redirect naar index.php na succesvolle invoer
            header('Location: index.php');  
            exit;
        } else {
            echo "Er is iets misgegaan met het invoegen van de data.";
        }
    } catch (Exception $e) {
        echo "Er is een fout opgetreden: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registratie</title>
    <script>
    function validateForm() {
        var name = document.getElementById("name").value;
        var surname = document.getElementById("surname").value;
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;

        if (name == "") {
            alert("Vul alstublieft uw naam in.");
            return false;
        }

        if (surname == "") {
            alert("Vul alstublieft uw achternaam in.");
            return false;
        }

        if (email == "") {
            alert("Vul alstublieft uw e-mail in.");
            return false;
        }

        if (password == "") {
            alert("Vul alstublieft uw wachtwoord in.");
            return false;
        }

        return true;
    }
    </script>
</head>
<body>
<div class="container mt-5">
    <h1>Registreren</h1>
    <form action="registratie.php" method="POST" onsubmit="return validateForm()">
        <div class="form-group">
            <label for="name">Voornaam:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="surname">Achternaam:</label>
            <input type="text" class="form-control" id="surname" name="surname" required>
        </div>
        <div class="form-group">
            <label for="email">E-mailadres:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Wachtwoord:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Registreren</button>
    </form>
</div>
</body>
</html>
