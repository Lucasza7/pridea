<?php
session_start();
require_once '../db.php';
require_once '../classes/Reservering.php';
require_once '../classes/Kamer.php';

// Check of medewerker is ingelogd
if (!isset($_SESSION['medewerker_id'])) {
    header("Location: login.php");
    exit();
}

// Uitloggen
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

$reservering = new Reservering($pdo);
$kamer = new Kamer($pdo);

// Verwerk verwijdering als er een DELETE request is
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_reservering'])) {
    $reservering_id = $_POST['reservering_id'];
    if ($reservering->delete($reservering_id)) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}

// Verwerk wijziging als er een UPDATE request is
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_reservering'])) {
    $reservering_id = $_POST['reservering_id'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $klant_id = $_POST['klant_id'];
    $type = $_POST['type'];
    
    // Klantnaam updaten
    $klant_naam = $_POST['klant_naam'];
    $update_klant_query = "UPDATE Klant SET naam = :naam WHERE klant_id = :klant_id";
    $stmt = $pdo->prepare($update_klant_query);
    $stmt->bindParam(':naam', $klant_naam);
    $stmt->bindParam(':klant_id', $klant_id);
    $stmt->execute();
    
    if ($reservering->update($reservering_id, $check_in, $check_out, $klant_id, $type)) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}

// Alle reserveringen en kamers ophalen
$reserveringen = $reservering->getReservations();
$kamers = $kamer->getAllRooms();

// Check beschikbaarheid voor vandaag
$vandaag = date('Y-m-d');
$beschikbare_kamers = $kamer->checkAvailability($vandaag);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Hotel Ter Duin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../stylesheets/homepage.css">
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
    </style>
</head>
<body>
    <div class="header no-print">
        <h1>Hotel Ter Duin - Dashboard</h1>
        <form method="POST" style="position: absolute; top: 10px; right: 10px;">
            <button type="submit" name="logout" class="btn btn-danger">Uitloggen</button>
        </form>
    </div>

    <nav class="navbar no-print">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="reservering.php">Reserveren</a></li>
        </ul>
    </nav>

    <div class="container mt-5">
        <?php if($beschikbare_kamers <= 2): ?>
            <div class="alert alert-danger">
                <strong>Let op!</strong> Er zijn nog maar <?php echo $beschikbare_kamers; ?> kamers beschikbaar!
            </div>
        <?php else: ?>
            <div class="alert alert-info">
                Aantal beschikbare kamers vandaag: <?php echo $beschikbare_kamers; ?>
            </div>
        <?php endif; ?>

        <button onclick="window.print()" class="btn btn-primary mb-4 no-print">Gereserveerde Kamers Afdrukken</button>
        
        <div class="print-only">
            <h2 class="text-center mb-4">Gereserveerde Kamers - Hotel Ter Duin</h2>
        </div>

        <h2 class="no-print">Overzicht Reserveringen</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Kamer</th>
                    <th>Type</th>
                    <th>Klantnaam</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                    <th>Totaal Bedrag</th>
                    <th>Status</th>
                    <th class="no-print">Acties</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $gereserveerde_kamers = [];
                foreach($reserveringen as $res): 
                    // Klantnaam ophalen
                    $klant_query = "SELECT naam FROM Klant WHERE klant_id = :klant_id";
                    $stmt = $pdo->prepare($klant_query);
                    $stmt->bindParam(':klant_id', $res['klant_id']);
                    $stmt->execute();
                    $klant = $stmt->fetch(PDO::FETCH_ASSOC);
                    
                    foreach($kamers as $k) {
                        if($k['kamer_id'] == $res['kamer_id']) {
                            $gereserveerde_kamers[] = $k;
                            
                            // Nachten berekenen
                            $check_in_date = new DateTime($res['check_in']);
                            $check_out_date = new DateTime($res['check_out']);
                            $interval = $check_in_date->diff($check_out_date);
                            $aantal_nachten = $interval->days;
                            
                            // Totaalbedrag berekenen
                            $totaal_bedrag = $aantal_nachten * $k['prijs'];
                ?>
                    <!-- Begin van reserveringsrij in tabel -->
                    <tr>
                        <td><?php echo htmlspecialchars($k['kamernummer']); ?></td>
                        <td><?php echo htmlspecialchars($k['type']); ?></td>
                        <td><?php echo htmlspecialchars($klant['naam']); ?></td>
                        <td><?php echo date('Y-m-d H:i', strtotime($res['check_in'])); ?></td>
                        <td><?php echo date('Y-m-d H:i', strtotime($res['check_out'])); ?></td>
                        <td>€<?php echo number_format($totaal_bedrag, 2); ?></td>
                        <td><?php echo htmlspecialchars($res['status']); ?></td>
                        
                        <!-- Kolom met verwijder- en wijzigknoppen (niet zichtbaar bij afdrukken) -->
                        <td class="no-print">
                            <!-- Verwijderknop met bevestigingsdialoog -->
                            <form method="POST" style="display: inline;">
                                <input type="hidden" name="reservering_id" value="<?php echo $res['reservering_id']; ?>">
                                <button type="submit" name="delete_reservering" class="btn btn-danger btn-sm" onclick="return confirm('Weet u zeker dat u deze reservering wilt verwijderen?')">Verwijderen</button>
                            </form>

                            <!-- Knop om wijzigingsmodal te openen -->
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal<?php echo $res['reservering_id']; ?>">
                                Wijzigen
                            </button>

                            <!-- Modal voor het wijzigen van reserveringsgegevens -->
                            <div class="modal fade" id="editModal<?php echo $res['reservering_id']; ?>" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <!-- Modal header met titel en sluitknop -->
                                        <div class="modal-header">
                                            <h5 class="modal-title">Reservering Wijzigen</h5>
                                            <button type="button" class="close" data-dismiss="modal">
                                                <span>&times;</span>
                                            </button>
                                        </div>
                                        
                                        <!-- Modal body met wijzigingsformulier -->
                                        <div class="modal-body">
                                            <form method="POST">
                                                <input type="hidden" name="reservering_id" value="<?php echo $res['reservering_id']; ?>">
                                                
                                                <!-- Veld voor klantnaam -->
                                                <div class="form-group">
                                                    <label>Klantnaam:</label>
                                                    <input type="text" class="form-control" name="klant_naam" value="<?php echo htmlspecialchars($klant['naam']); ?>" required>
                                                </div>
                                                
                                                <!-- Dropdown voor kamertype -->
                                                <div class="form-group">
                                                    <label>Type:</label>
                                                    <select class="form-control" name="type">
                                                        <?php foreach($kamers as $kamer): ?>
                                                            <option value="<?php echo htmlspecialchars($kamer['type']); ?>" <?php echo ($kamer['type'] == $k['type']) ? 'selected' : ''; ?>>
                                                                <?php echo htmlspecialchars($kamer['type']); ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                
                                                <!-- Veld voor check-in datum/tijd -->
                                                <div class="form-group">
                                                    <label>Check-in:</label>
                                                    <input type="datetime-local" class="form-control" name="check_in" value="<?php echo date('Y-m-d\TH:i', strtotime($res['check_in'])); ?>" required>
                                                </div>
                                                
                                                <!-- Veld voor check-out datum/tijd -->
                                                <div class="form-group">
                                                    <label>Check-out:</label>
                                                    <input type="datetime-local" class="form-control" name="check_out" value="<?php echo date('Y-m-d\TH:i', strtotime($res['check_out'])); ?>" required>
                                                </div>
                                                
                                                <input type="hidden" name="klant_id" value="<?php echo $res['klant_id']; ?>">
                                                <button type="submit" name="update_reservering" class="btn btn-primary">Opslaan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php 
                        }
                    }
                endforeach; 
                ?>
            </tbody>
        </table>

        <!-- Sectie voor overzicht van alle kamers (niet zichtbaar bij afdrukken) -->
        <h2 class="mt-5 no-print">Overzicht Alle Kamers</h2>
        <table class="table table-striped no-print">
            <thead>
                <tr>
                    <th>Kamer ID</th>
                    <th>Kamernummer</th>
                    <th>Type</th>
                    <th>Prijs per nacht</th>
                    <th>Beschikbaarheid</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($kamers as $kamerData): 
                    // Controleer of de kamer momenteel bezet is
                    $is_gereserveerd = false;
                    foreach($reserveringen as $res) {
                        // Vergelijk kamer IDs
                        if($res['kamer_id'] == $kamerData['kamer_id']) {
                            // Converteer datums naar DateTime objecten voor vergelijking
                            $check_in = new DateTime($res['check_in']);
                            $check_out = new DateTime($res['check_out']);
                            $vandaag_date = new DateTime($vandaag);
                            
                            // Controleer of de huidige datum binnen de reserveringsperiode valt
                            if($vandaag_date >= $check_in && $vandaag_date <= $check_out) {
                                $is_gereserveerd = true;
                                break;
                            }
                        }
                    }
                ?>
                    <!-- Rij met kamerinformatie -->
                    <tr>
                        <td><?php echo htmlspecialchars($kamerData['kamer_id']); ?></td>
                        <td><?php echo htmlspecialchars($kamerData['kamernummer']); ?></td>
                        <td><?php echo htmlspecialchars($kamerData['type']); ?></td>
                        <td>€<?php echo htmlspecialchars($kamerData['prijs']); ?></td>
                        <td><?php echo $is_gereserveerd ? 'Bezet' : 'Beschikbaar'; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
