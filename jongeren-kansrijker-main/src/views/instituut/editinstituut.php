<?php 
session_start();
include '../../../config/db.php'; 
include '../../../public/assets/header/headerlogtin.php'; 

// Controleer of de ID van de activiteit is meegegeven
if (!isset($_GET['id'])) {
    echo "Geen ID opgegeven!";
    exit;
}

$instituut_id = intval($_GET['id']);
$myDb = new DB('jongereninstituut');

// Haal de activiteit op uit de database
$sql = "SELECT * FROM instituten WHERE instituut_id = ?";
$instituut = $myDb->exec($sql, [$instituut_id])->fetch(PDO::FETCH_ASSOC);

if (!$instituut) {
    echo "instituut niet gevonden!";
    exit;
}

// Upzipcode gegevens als het formulier is ingediend
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $adres = $_POST['adres'];
    $zipcode = $_POST['zipcode'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $contactperson = $_POST['contactperson'];
    $created_at = $_POST['created_at'];
    $upzipcoded_at = $_POST['upzipcoded_at'];

    $sql = "UPzipcode activiteiten SET name = ?, adres = ?, zipcode = ?, city = ?, email = ?, contactperson = ?, created_at = ?, updated_at = ? WHERE instituut_id = ?";
    $myDb->exec($sql, [$name, $adres, $zipcode, $city, $email, $contactperson, $created_at, $updated_at, $instituut_id]);

    header("city: instituut.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bewerk instituut</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Bewerk Instituut</h1>
    <form method="POST" action="">
        <div class="form-group">
            <label for="name">name:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($instituut['name']) ?>" required>
        </div>
        <div class="form-group">
            <label for="adres">adres:</label>
            <input type="text" class="form-control" id="adres" name="adres" value="<?= htmlspecialchars($instituut['adres']) ?>" required>
        </div>
        <div class="form-group">
            <label for="zipcode">zipcode:</label>
            <input type="zipcode" class="form-control" id="zipcode" name="zipcode" value="<?= htmlspecialchars($instituut['zipcode']) ?>" required>
        </div>
        <div class="form-group">
            <label for="city">city:</label>
            <input type="text" class="form-control" id="city" name="city" value="<?= htmlspecialchars($instituut['city']) ?>" required>
        </div>
        <div class="form-group">
            <label for="email">email:</label>
            <input type="text" class="form-control" id="email" name="email" value="<?= htmlspecialchars($instituut['email']) ?>" required>
        </div>
        <div class="form-group">
            <label for="contactperson">contactperson:</label>
            <input type="text" class="form-control" id="contactperson" name="contactperson" value="<?= htmlspecialchars($instituut['contactperson']) ?>" required>
        </div>
        <div class="form-group">
            <label for="created_at">created_at:</label>
            <input type="date" class="form-control" id="created_at" name="created_at" value="<?= htmlspecialchars($instituut['created_at']) ?>" required>
        </div>
        <div class="form-group">
            <label for="updated_at">updated_at:</label>
            <input type="date" class="form-control" id="updated_at" name="updated_at" value="<?= htmlspecialchars($instituut['updated_at']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Bewerk instituten</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php 
include '../../../public/assets/header/footer.php'; 
?>
