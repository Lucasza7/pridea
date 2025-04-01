<?php
// Importeer benodigde klassen en database configuratie
require_once '../classes/Reservering.php';
require_once '../db.php';

// Maak een nieuwe instantie van de Reservering klasse
$reservering = new Reservering($pdo);

// Haal alle beschikbare kamers op uit de database
$query = "SELECT kamer_id, type, prijs FROM Kamer";
$stmt = $pdo->prepare($query);
$stmt->execute();
$kamers = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Verwerk het reserveringsformulier wanneer deze wordt ingediend
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Haal de formuliergegevens op
    $klant_id = $_POST["klant_id"];
    $kamer_id = $_POST["kamer_id"];
    $check_in = $_POST["check_in"];
    $check_out = $_POST["check_out"];

    // Probeer de reservering op te slaan en toon een melding
    if ($reservering->create($klant_id, $kamer_id, $check_in, $check_out)) {
        echo "Reservering succesvol opgeslagen!";
    } else {
        echo "Fout bij het opslaan van de reservering.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reservering</title>
    <!-- Laad externe stylesheets -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../stylesheets/homepage.css">
    <!-- Print-specifieke styling -->
    <style>
        @media print {
            .no-print {
                display: none;
            }
            .print-only {
                display: block !important;
            }
        }
        .print-only {
            display: none;
        }
        body {
            background-image: url('../images/achtergrond.jpeg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-color: #f5f7fa;
        }
        .form-group , h2{
            color: white;
        }
    </style>
</head>
<body>

<!-- Header sectie -->
<div class="header no-print">
        <h1>Welkom bij Hotel Ter Duin</h1>
        <p>Uw luxe verblijf aan de Nederlandse kust</p>
    </div>

<!-- Navigatiemenu -->
<nav class="navbar no-print">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="login.php">Inloggen</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="reservering.php">Reserveren</a></li>
        </ul>
    </nav>
    <div class="container mt-5">
        <!-- Print versie titel -->
        <div class="print-only">
            <h2 class="text-center mb-4">Reserveringsbevestiging - Hotel Ter Duin</h2>
        </div>

        <!-- Reserveringsformulier -->
        <h2 class="no-print">Maak een Reservering</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="mt-4">
            <!-- Klantgegevens -->
            <div class="form-group">
                <label for="klant_id">Klant Naam:</label>
                <input type="text" class="form-control" id="klant_id" name="klant_id" required>
            </div>
            <!-- Kamerselectie -->
            <div class="form-group">
                <label for="kamer_id">Kamer:</label>
                <select class="form-control" id="kamer_id" name="kamer_id" required>
                    <?php foreach ($kamers as $kamer): ?>
                        <option value="<?php echo $kamer['kamer_id']; ?>" data-prijs="<?php echo $kamer['prijs']; ?>">
                            <?php echo $kamer['type']; ?> - €<?php echo $kamer['prijs']; ?> per nacht
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- Check-in datum -->
            <div class="form-group">
                <label for="check_in">Check-in Datum:</label>
                <input type="datetime-local" class="form-control" id="check_in" name="check_in" required>
            </div>
            <!-- Check-out datum -->
            <div class="form-group">
                <label for="check_out">Check-out Datum:</label>
                <input type="datetime-local" class="form-control" id="check_out" name="check_out" required>
            </div>
            <!-- Prijsberekening -->
            <div class="form-group">
                <label>Totale Prijs:</label>
                <div id="totale_prijs" class="form-control">€0.00</div>
            </div>
            <!-- Formulier knoppen -->
            <button type="submit" class="btn btn-primary no-print">Reserveren</button>
            <button type="button" onclick="window.print()" class="btn btn-secondary no-print">Reservering Afdrukken</button>
        </form>

        <!-- Print versie van de reserveringsdetails -->
        <div class="print-only mt-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Reserveringsdetails</h5>
                    <p class="card-text">
                        <strong>Naam:</strong> <span id="print_naam"></span><br>
                        <strong>Kamer Type:</strong> <span id="print_kamer"></span><br>
                        <strong>Check-in:</strong> <span id="print_checkin"></span><br>
                        <strong>Check-out:</strong> <span id="print_checkout"></span><br>
                        <strong>Totale Prijs:</strong> <span id="print_prijs"></span>
                    </p>
                </div>
            </div>
        </div>
    </div>

   
</body>
<footer>
<!-- Laad JavaScript voor prijsberekening -->
<script src="../stylesheets/prijs.js"></script>
</footer>
</html>
