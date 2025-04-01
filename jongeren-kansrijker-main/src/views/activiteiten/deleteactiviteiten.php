<?php 
session_start();
include '../../../config/db.php'; 
include '../../../public/assets/header/headerlogtin.php'; 

// Controleer of de ID van de jongere is meegegeven
if (!isset($_GET['id'])) {
    echo "Geen ID opgegeven!";
    exit;
}

$activiteit_id = intval($_GET['id']);
$myDb = new DB('Jongereninstituut');

// Verwijder de jongere als de bevestiging is gegeven
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $sql = "DELETE FROM activiteiten WHERE activiteit_id = ?";
    $myDb->exec($sql, [$activiteit_id]);

    header("Location: activiteiten.php");
    exit;
}

// Haal de jongere op uit de database voor bevestiging
$sql = "SELECT * FROM activiteiten WHERE activiteit_id = ?";
$activiteiten = $myDb->exec($sql, [$activiteit_id])->fetch(PDO::FETCH_ASSOC);

if (!$activiteiten) {
    echo "activiteit niet gevonden!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verwijder Activiteit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Verwijder Activiteit</h1>
    <p>Weet je zeker dat je deze activiteit <strong><?= htmlspecialchars($activiteiten['name']) ?></strong> wilt verwijderen?</p>
    
    <form method="POST" action="">
        <button type="submit" class="btn btn-danger">Verwijder</button>
        <a href="activiteiten.php" class="btn btn-secondary">Annuleer</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php 
include '../../../public/assets/header/footer.php'; 
?>
