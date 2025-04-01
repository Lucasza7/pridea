<?php

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Hotel Ter Duin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../stylesheets/homepage.css">
</head>
<body>
    <!-- Header sectie met titel van de contactpagina -->
    <div class="header">
        <h1>Hotel Ter Duin - Contact</h1>
    </div>

    <!-- Hoofdnavigatiemenu met links naar andere pagina's -->
    <nav class="navbar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="login.php">Inloggen</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="reservering.php">Reserveren</a></li>
        </ul>
    </nav>

    <!-- Container voor de contactgegevens -->
    <div class="container mt-5">
        <div class="row">
            <!-- Kolom met contactkaart, gecentreerd met offset -->
            <div class="col-md-8 offset-md-2">
                <!-- Contactkaart met contactgegevens -->
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Contact</h2>
                        <p class="card-text">Heeft u vragen of wilt u een reservering maken? Neem contact met ons op:</p>
                        
                        <!-- Lijst met contactgegevens -->
                        <div class="list-group">
                            <!-- Telefoonnummer met telefoon-icoon -->
                            <div class="list-group-item">
                                <i class="fas fa-phone"></i> Telefoon: +31 (0)70 123 4567
                            </div>
                            <!-- E-mailadres met e-mail-icoon -->
                            <div class="list-group-item">
                                <i class="fas fa-envelope"></i> Email: info@hotelterduin.nl
                            </div>
                            <!-- Fysiek adres met locatie-icoon -->
                            <div class="list-group-item">
                                <i class="fas fa-map-marker-alt"></i> Adres: Duinweg 123, 2584 AB Den Haag
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>