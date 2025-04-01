<?php 
session_start();
include '../../../config/db.php'; 
include '../../../public/assets/header/headerlogtin.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Haal de gegevens op van het formulier
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $adres = $_POST['adres'];
    $zipcode = $_POST['zipcode'];
    $telefoonnummer = $_POST['telefoonnummer'];
    $state = $_POST['state'];
    $dateofBirth = $_POST['dateofBirth'];
    $activiteit = $_POST['activiteit'];

    // Maak verbinding met de database en voer de INSERT-query uit
    $myDb = new DB('Jongereninstituut');
    $sql = "INSERT INTO jongeren (name, surname, email, adres, zipcode, telefoonnummer, state, dateofBirth, activiteit) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $myDb->exec($sql, [$name, $surname, $email, $adres, $zipcode, $telefoonnummer, $state, $dateofBirth, $activiteit]);

    header("Location: jongeren.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voeg Jongere Toe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Voeg Jongere Toe</h1>
    <form method="POST" action="">
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
            <label for="adres">Adres:</label>
            <input type="text" class="form-control" id="adres" name="adres" required>
        </div>
        <div class="form-group">
            <label for="zipcode">Postcode:</label>
            <input type="text" class="form-control" id="zipcode" name="zipcode" required>
        </div>
        <div class="form-group">
            <label for="telefoonnummer">Telefoonnummer:</label>
            <input type="text" class="form-control" id="telefoonnummer" name="telefoonnummer" required>
        </div>
        <div class="form-group">
            <label for="state">Status:</label>
            <input type="text" class="form-control" id="state" name="state" required>
        </div>
        <div class="form-group">
            <label for="dateofBirth">Geboortedatum:</label>
            <input type="date" class="form-control" id="dateofBirth" name="dateofBirth" required>
        </div>
        <div class="form-group">
            <label for="activiteit">Activiteit:</label>
            <input type="text" class="form-control" id="activiteit" name="activiteit" required>
        </div>
        <button type="submit" class="btn btn-primary">Voeg Jongere Toe</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php 
include '../../../public/assets/header/footer.php'; 
?>
