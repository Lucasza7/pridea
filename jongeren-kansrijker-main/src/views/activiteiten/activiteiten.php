<?php 
session_start();
include '../../../config/db.php'; 
include '../../../public/assets/header/headerlogtin.php'; 

// Maak verbinding met de database
$myDb = new DB('Jongereninstituut');
$sql = "SELECT * FROM activiteiten";
$activiteiten = $myDb->exec($sql)->fetchAll(PDO::FETCH_ASSOC);
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>activiteiten Lijst</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>activiteiten Lijst</h1>
    <a href="addactiviteiten.php" class="btn btn-success mb-3">Voeg Activiteit Toe</a>
    <table class="table">
        <thead>
            <tr>
                <th>naam</th>
                <th>bio</th>
                <th>Datum</th>
                <th>Locatie</th> <!-- Nieuwe kolom toegevoegd -->
                <th>Max-personen</th>
                <th>Tijd</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($activiteiten as $activiteit): ?>
                <tr>
                    <td><?= htmlspecialchars($activiteit['name']) ?></td>
                    <td><?= htmlspecialchars($activiteit['bio']) ?></td>
                    <td><?= htmlspecialchars($activiteit['date']) ?></td>
                    <td><?= htmlspecialchars($activiteit['location']) ?></td> 
                    <td><?= htmlspecialchars(string: $activiteit['max_participants'])?></td>
                    <td><?= htmlspecialchars(string: $activiteit['time'])?></td>

                    <td>
                        <a href="editactiviteiten.php?id=<?= $activiteit['activiteit_id'] ?>" class="btn btn-warning">Bewerken</a>
                        <a href="deleteactiviteiten.php?id=<?= $activiteit['activiteit_id'] ?>" class="btn btn-danger">Verwijderen</a>
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
