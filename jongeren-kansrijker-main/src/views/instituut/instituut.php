<?php 
session_start();
include '../../../config/db.php'; 
include '../../../public/assets/header/headerlogtin.php'; 

// Maak verbinding met de database
$myDb = new DB('Jongereninstituut');
$sql = "SELECT * FROM instituten";
$instituten = $myDb->exec($sql)->fetchAll(PDO::FETCH_ASSOC);
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>instituten Lijst</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>instituten Lijst</h1>
    <a href="addinstituut.php" class="btn btn-success mb-3">Voeg instituten Toe</a>
    <table class="table">
        <thead>
            <tr>
                <th>naam</th>
                <th>adres</th>
                <th>zipcode</th>
                <th>city</th> <!-- Nieuwe kolom toegevoegd -->
                <th>email</th>
                <th>contactperson</th>
                <th>created_at</th>
                <th>updated_at</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($instituten as $instituut): ?>
                <tr>
                    <td><?= htmlspecialchars($instituut['name']) ?></td>
                    <td><?= htmlspecialchars($instituut['adres']) ?></td>
                    <td><?= htmlspecialchars($instituut['zipcode']) ?></td>
                    <td><?= htmlspecialchars($instituut['city']) ?></td> 
                    <td><?= htmlspecialchars(string: $instituut['email'])?></td>
                    <td><?= htmlspecialchars(string: $instituut['contactperson'])?></td>
                    <td><?= htmlspecialchars(string: $instituut['created_at'])?></td>
                    <td><?= htmlspecialchars(string: $instituut['updated_at'])?></td>


                    <td>
                        <a href="editinstituut.php?id=<?= $instituut['instituut_id'] ?>" class="btn btn-warning">Bewerken</a>
                        <a href="deleteinstituut.php?id=<?= $instituut['instituut_id'] ?>" class="btn btn-danger">Verwijderen</a>
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
