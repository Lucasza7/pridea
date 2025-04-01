<?php 
session_start();
include '../../../config/db.php'; 
include '../../../public/assets/header/headerlogtin.php'; 

// Maak verbinding met de database
$myDb = new DB('Jongereninstituut');
$sql = "SELECT * FROM jongeren";
$jongeren = $myDb->exec($sql)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jongeren Lijst</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Jongeren Lijst</h1>
    <a href="addjongeren.php" class="btn btn-success mb-3">Voeg Jongere Toe</a>
    <table class="table">
        <thead>
            <tr>
                <th>Voornaam</th>
                <th>Achternaam</th>
                <th>E-mailadres</th>
                <th>Activiteit</th> <!-- Nieuwe kolom toegevoegd -->
                <th>Geboortedatum</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jongeren as $jongere): ?>
                <tr>
                    <td><?= htmlspecialchars($jongere['name']) ?></td>
                    <td><?= htmlspecialchars($jongere['surname']) ?></td>
                    <td><?= htmlspecialchars($jongere['email']) ?></td>
                    <td><?= htmlspecialchars($jongere['activiteit']) ?></td> <!-- Nieuwe kolom toegevoegd -->
                    <td><?= isset($jongere['dateofBirth']) ? htmlspecialchars($jongere['dateofBirth']) : 'Geen geboortedatum beschikbaar' ?></td>



                        <a href="editjongeren.php?id=<?= $jongere['jongere_id'] ?>" class="btn btn-warning">Bewerken</a>
                        <a href="deletejongeren.php?id=<?= $jongere['jongere_id'] ?>" class="btn btn-danger">Verwijderen</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php 
include '../../../public/assets/header/footer.php'; 
?>
