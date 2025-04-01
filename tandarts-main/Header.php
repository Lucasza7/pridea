<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tandarts Website</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f4f8;
            font-family: 'Georgia', serif;
        }
        .navbar {
            background-color: #004080; /* Dark blue */
        }
        .navbar-brand, .nav-link {
            color: #ffffff;
        }
        .navbar-brand {
            font-size: 1.8rem;
            font-weight: bold;
        }
        .nav-link {
            font-size: 1.2rem;
            font-weight: bold;
        }
        .nav-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="index.php">Tandarts</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="maak-afspraken.php">Maak Afspraken</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="beheer-afspraken.php">Beheer Afspraken</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="avg-cyber-security.php">AVG & Cyber Security</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="over-ons.php">Over Ons</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="bereik-ons.php">bereik-ons</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
