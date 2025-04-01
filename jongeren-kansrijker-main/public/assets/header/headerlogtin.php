<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mijn Website</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Aangepaste CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="bg-primary text-white text-center py-3">
        <h1>Instituut jongeren kansrijker</h1>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="#">jongeren kansrijker</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">


                        <li class="nav-item"><a class="nav-link" href="../../../src/views/activiteiten/activiteiten.php">activiteiten</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">medewerkers</a></li>
                        <li class="nav-item"><a class="nav-link" href="../../../src/views/instituut/instituut.php">instituten</a></li>
                        <li class="nav-item"><a class="nav-link" href="../../../src/views/jongeren/jongeren.php">jongeren</a></li>
                    </ul>
                    
                    <!-- Uitlogknop -->

                    <form action="../../../src/views/medewerkers/loguit.php" method="POST">



                    <form action="../../src/views/medewerkers/loguit.php" method="POST">

                    <form action="../../src/views/medewerkers/loguit.php" method="POST">
                        <button type="submit" class="btn btn-outline-light">Uitloggen</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
</body>
</html>

