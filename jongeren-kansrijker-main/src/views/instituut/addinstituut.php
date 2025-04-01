<?php 
session_start();
include '../../../config/db.php'; 
include '../../../public/assets/header/headerlogtin.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Haal de gegevens op van het formulier
    $name = $_POST['name'];
    $adres = $_POST['adres'];
    $zipcode = $_POST['zipcode'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $contactperson = $_POST['contactperson'];
    $created_at = $_POST['created_at'];
    $updated_at = $_POST['updated_at'];


    // Maak verbinding met de database en voer de INSERT-query uit
    $myDb = new DB('Jongereninstituut');
    $sql = "INSERT INTO instituten (name, adres, zipcode, city, email, contactperson, created_at, updated_at) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)";
    $myDb->exec($sql, [$name, $adres, $zipcode, $city, $email, $contactperson, $created_at, $updated_at]);

    header("city: instituut.php");
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
    <h1>Voeg instituut Toe</h1>
    <form method="POST" action="">
        <div class="form-group">
            <label for="name">naam:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="adres">adres:</label>
            <input type="text" class="form-control" id="adres" name="adres" required>
        </div>
        <div class="form-group">
            <label for="zipcode">zipcode:</label>
            <input type="text" class="form-control" id="zipcode" name="zipcode" required>
        </div>
        <div class="form-group">
            <label for="city">city:</label>
            <input type="text" class="form-control" id="city" name="city" required>
        </div>
        <div class="form-group">
            <label for="email">email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="contactperson">contactperson:</label>
            <input type="text" class="form-control" id="contactperson" name="contactperson" required>
        </div>
        <div class="form-group">
            <label for="created_at">created_at:</label>
            <input type="date" class="form-control" name="created_at" id="created_at" required>
        </div>
        <div class="form-group">
            <label for="updated_at">updated_at:</label>
            <input type="date" class="form-control" name="updated_at" id="updated_at" required>
        </div>
        <button type="submit" class="btn btn-primary">Voeg Instituut Toe</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php 
include '../../../public/assets/header/footer.php'; 
?>
