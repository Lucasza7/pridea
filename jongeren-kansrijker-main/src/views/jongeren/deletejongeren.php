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

// Verwijder de jongere als de bevestiging is gegeven
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $sql = "DELETE FROM jongeren WHERE jongere_id = ?";
    $myDb->exec($sql, [$jongere_id]);

    header("Location: jongeren.php");
    exit;
}

// Haal de jongere op uit de database voor bevestiging
$sql = "SELECT * FROM jongeren WHERE jongere_id = ?";
$jongere = $myDb->exec($sql, [$jongere_id])->fetch(PDO::FETCH_ASSOC);

if (!$jongere) {
    echo "Jongere niet gevonden!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verwijder Jongere</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Verwijder Jongere</h1>
    <p>Weet je zeker dat je de jongere <strong><?= htmlspecialchars($jongere['name']) . ' ' . htmlspecialchars($jongere['surname']) ?></strong> wilt verwijderen?</p>
    
    <form method="POST" action="">
        <button type="submit" class="btn btn-danger">Verwijder</button>
        <a href="jongeren.php" class="btn btn-secondary">Annuleer</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php 
include '../../../public/assets/header/footer.php'; 
?>
