<?php 
session_start();
include '../../../config/db.php'; 
include '../../../public/assets/header/headerlogtin.php'; 

// Controleer of de ID van de activiteit is meegegeven
if (!isset($_GET['id'])) {
    echo "Geen ID opgegeven!";
    exit;
}

$activiteit_id = intval($_GET['id']);
$myDb = new DB('jongereninstituut');

// Haal de activiteit op uit de database
$sql = "SELECT * FROM activiteiten WHERE activiteit_id = ?";
$activiteit = $myDb->exec($sql, [$activiteit_id])->fetch(PDO::FETCH_ASSOC);

if (!$activiteit) {
    echo "activiteit niet gevonden!";
    exit;
}

// Update gegevens als het formulier is ingediend
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $bio = $_POST['bio'];
    $date = $_POST['date'];
    $location = $_POST['location'];
    $max_participants = $_POST['max_participants'];
    $time = $_POST['time'];

    $sql = "UPDATE activiteiten SET name = ?, bio = ?, date = ?, location = ?, max_participants = ?, time = ? WHERE activiteit_id = ?";
    $myDb->exec($sql, [$name, $bio, $date, $location, $max_participants, $time, $activiteit_id]);

    header("Location: activiteiten.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bewerk Activiteiten</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Bewerk Activiteiten</h1>
    <form method="POST" action="">
        <div class="form-group">
            <label for="name">name:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($activiteit['name']) ?>" required>
        </div>
        <div class="form-group">
            <label for="bio">bio:</label>
            <input type="text" class="form-control" id="bio" name="bio" value="<?= htmlspecialchars($activiteit['bio']) ?>" required>
        </div>
        <div class="form-group">
            <label for="date">date:</label>
            <input type="date" class="form-control" id="date" name="date" value="<?= htmlspecialchars($activiteit['date']) ?>" required>
        </div>
        <div class="form-group">
            <label for="location">location:</label>
            <input type="text" class="form-control" id="location" name="location" value="<?= htmlspecialchars($activiteit['location']) ?>" required>
        </div>
        <div class="form-group">
            <label for="max_participants">max_personen:</label>
            <input type="text" class="form-control" id="max_participants" name="max_participants" value="<?= htmlspecialchars($activiteit['max_participants']) ?>" required>
        </div>
        <div class="form-group">
            <label for="time">time:</label>
            <input type="text" class="form-control" id="time" name="time" value="<?= htmlspecialchars($activiteit['time']) ?>" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Bewerk Activiteiten</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php 
include '../../../public/assets/header/footer.php'; 
?>
