<?php
// Start een nieuwe sessie voor de gebruiker
session_start();
// Importeer database configuratie
require_once '../db.php';

// Controleer of het formulier is verzonden via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Haal inloggegevens op uit het formulier
    $gebruikersnaam = $_POST['gebruikersnaam'];
    $wachtwoord = $_POST['wachtwoord'];

    // Controleer of de inloggegevens kloppen met de admin account
    if ($gebruikersnaam === 'admin' && $wachtwoord === 'admin123') {
        // Sla medewerker ID op in sessie
        $_SESSION['medewerker_id'] = 1;
        // Stuur gebruiker door naar dashboard
        header("Location: viewdashboard.php");
        exit();
    } else {
        // Toon foutmelding bij ongeldige inloggegevens
        $error = "Ongeldige gebruikersnaam of wachtwoord";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medewerkers Login - Hotel Ter Duin</title>
    <!-- Laad externe stylesheets -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../stylesheets/homepage.css">
</head>
<body>
    <!-- Header sectie -->
    <div class="header">
        <h1>Hotel Ter Duin - Medewerkers Login</h1>
    </div>

    <!-- Navigatiemenu -->
    <nav class="navbar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="login.php">Inloggen</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="reservering.php">Reserveren</a></li>
        </ul>
    </nav>

    <!-- Login formulier container -->
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Medewerkers Login</h3>
                        
                        <!-- Toon eventuele foutmeldingen -->
                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error; ?>
                            </div>
                        <?php endif; ?>
                        
                        <!-- Login formulier -->
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="gebruikersnaam">Gebruikersnaam:</label>
                                <input type="text" class="form-control" id="gebruikersnaam" name="gebruikersnaam" required>
                            </div>

                            <div class="form-group">
                                <label for="wachtwoord">Wachtwoord:</label>
                                <input type="password" class="form-control" id="wachtwoord" name="wachtwoord" required>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Inloggen</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Toon eventuele informatieberichten -->
    <?php if (isset($info)): ?>
        <div class="alert alert-info" role="alert">
            <?php echo $info; ?>
        </div>
    <?php endif; ?>
</body>
</html>
