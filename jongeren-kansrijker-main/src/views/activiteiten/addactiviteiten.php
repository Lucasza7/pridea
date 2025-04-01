<?php 
session_start();
include '../../../config/db.php'; 
include '../../../public/assets/header/headerlogtin.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Haal de gegevens op van het formulier
    $name = $_POST['name'];
    $bio = $_POST['bio'];
    $date = $_POST['date'];
    $location = $_POST['location'];
    $max_participants = $_POST['max_participants = $'];
    $time = $_POST['time'];

    // Maak verbinding met de database en voer de INSERT-query uit
    $myDb = new DB('Jongereninstituut');
    $sql = "INSERT INTO activiteiten (name, bio, date, location, max_participants, time) VALUES ( ?, ?, ?, ?, ?, ?)";
    $myDb->exec($sql, [$name, $bio, $date, $location, $max_participants, $time]);

    header("Location: activiteiten.php");
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
    <h1>Voeg ACtiviteit Toe</h1>
    <form method="POST" action="">
        <div class="form-group">
            <label for="name">naam:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="bio">bio:</label>
            <input type="text" class="form-control" id="bio" name="bio" required>
        </div>
        <div class="form-group">
            <label for="date">datum:</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="form-group">
            <label for="lcoation">locatie:</label>
            <input type="text" class="form-control" id="location" name="location" required>
        </div>
        <div class="form-group">
            <label for="max_participants">max_personen:</label>
            <input type="text" class="form-control" id="max_participants" name="max_participants" required>
        </div>
        <div class="form-group">
            <label for="time">tijd:</label>
            <input type="time" class="form-control" id="time" name="time" required>
        </div>
        <button type="submit" class="btn btn-primary">Voeg ACtiviteit Toe</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php 
include '../../../public/assets/header/footer.php'; 
?>
