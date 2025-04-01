<?php 
session_start();
include '../../../config/db.php'; 
include '../../../public/assets/header/headerlogtin.php'; 

// Controleer of de ID van de jongere is meegegeven
if (!isset($_GET['id'])) {
    echo "Geen ID opgegeven!";
    exit;
}

$jongere_id = intval($_GET['id']);
$myDb = new DB('Jongereninstituut');

// Haal de jongere op uit de database
$sql = "SELECT * FROM jongeren WHERE jongere_id = ?";
$jongere = $myDb->exec($sql, [$jongere_id])->fetch(PDO::FETCH_ASSOC);

if (!$jongere) {
    echo "Jongere niet gevonden!";
    exit;
}

// Update gegevens als het formulier is ingediend
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $adres = $_POST['adres'];
    $zipcode = $_POST['zipcode'];
    $telefoonnummer = $_POST['telefoonnummer'];
    $state = $_POST['state'];
    $dateofBirth = $_POST['dateofBirth'];
    $activiteit = $_POST['activiteit'];

    $sql = "UPDATE jongeren SET name = ?, surname = ?, email = ?, adres = ?, zipcode = ?, telefoonnummer = ?, state = ?, dateofBirth = ?, activiteit = ? WHERE jongere_id = ?";
    $myDb->exec($sql, [$name, $surname, $email, $adres, $zipcode, $telefoonnummer, $state, $dateofBirth, $activiteit, $jongere_id]);

    header("Location: jongeren.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bewerk Jongere</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Bewerk Jongere</h1>
    <form method="POST" action="">
        <div class="form-group">
            <label for="name">Voornaam:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($jongere['name']) ?>" required>
        </div>
        <div class="form-group">
            <label for="surname">Achternaam:</label>
            <input type="text" class="form-control" id="surname" name="surname" value="<?= htmlspecialchars($jongere['surname']) ?>" required>
        </div>
        <div class="form-group">
            <label for="email">E-mailadres:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($jongere['email']) ?>" required>
        </div>
        <div class="form-group">
            <label for="adres">Adres:</label>
            <input type="text" class="form-control" id="adres" name="adres" value="<?= htmlspecialchars($jongere['adres']) ?>" required>
        </div>
        <div class="form-group">
            <label for="zipcode">Postcode:</label>
            <input type="text" class="form-control" id="zipcode" name="zipcode" value="<?= htmlspecialchars($jongere['zipcode']) ?>" required>
        </div>
        <div class="form-group">
            <label for="telefoonnummer">Telefoonnummer:</label>
            <input type="text" class="form-control" id="telefoonnummer" name="telefoonnummer" value="<?= htmlspecialchars($jongere['telefoonnummer']) ?>" required>
        </div>
        <div class="form-group">
            <label for="state">Status:</label>
            <input type="text" class="form-control" id="state" name="state" value="<?= htmlspecialchars($jongere['state']) ?>" required>
        </div>
        <div class="form-group">
    <label for="dateofBirth">Geboortedatum:</label>
     <input 
        type="date" class="form-control" id="dateofBirth" name="dateofBirth" 
        value="<?= isset($jongere['dateofBirth']) && preg_match('/^\d{4}-\d{2}-\d{2}$/', $jongere['dateofBirth']) ? htmlspecialchars($jongere['dateofBirth']) : '' ?>" 
        required>
      </div>
        <div class="form-group">
            <label for="activiteit">Activiteit:</label>
            <input type="text" class="form-control" id="activiteit" name="activiteit" value="<?= htmlspecialchars($jongere['activiteit']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Bewerk Jongere</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php 
include '../../../public/assets/header/footer.php'; 
?>
