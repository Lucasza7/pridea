`<!DOCTYPE html>
<html lang="en">
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
        .navbar, footer {
            background-color: #004080; /* Lighter dark blue */
        }
        .navbar-brand, .nav-link, footer h5, footer p, footer a, footer .contact-info {
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
        .login-btn {
            background-color: #336699;
            color: #ffffff;
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            transition: background-color 0.3s ease;
        }
        .login-btn:hover {
            background-color: #004080; /* Lighter dark blue */
        }
        .container h1 {
            color: #004080; /* Lighter dark blue */
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        .container p {
            color: #336699;
            font-size: 1.2rem;
        }
        .container img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
        footer {
            padding: 2rem 0;
        }
        footer .btn {
            margin: 0.5rem;
        }
        .service-box {
            border: 1px solid #336699;
            padding: 1.5rem;
            margin: 1rem 0;
            border-radius: 10px;
            display: block;
            width: 100%;
            font-size: 1.3rem;
            background-color: #e0f7fa;
            transition: transform 0.3s ease;
        }
        .service-box:hover {
            transform: scale(1.05);
        }
        .contact-info {
            color: #ffffff; /* Changed font color to white */
        }
    </style>
</head>
<body>

    <?php include 'header.php'; ?>
    <div class="container mt-5 text-center">
        <h1>Welkom bij onze Tandartspraktijk</h1>
        <p>Wij bieden de beste tandheelkundige zorg voor u en uw gezin.</p>
        <img src="img/1560854797.png" alt="Blije tandarts" class="img-fluid my-4">
        <p>Onze diensten omvatten:</p>
        <div class="row">
            <div class="col-md-12 service-box">
                <strong>Algemene tandheelkunde</strong>
                <p>Reguliere controles en behandelingen voor een gezond gebit.</p>
            </div>
            <div class="col-md-12 service-box">
                <strong>Cosmetische tandheelkunde</strong>
                <p>Verbeter uw glimlach met onze cosmetische behandelingen.</p>
            </div>
            <div class="col-md-12 service-box">
                <strong>Orthodontie</strong>
                <p>Rechtzetten van tanden en verbeteren van de beet.</p>
            </div>
            <div class="col-md-12 service-box">
                <strong>Tandheelkundige implantaten</strong>
                <p>Vervanging van ontbrekende tanden met implantaten.</p>
            </div>
            <div class="col-md-12 service-box">
                <strong>Tandheelkundige spoedzorg</strong>
                <p>Spoedbehandelingen voor tandheelkundige noodgevallen.</p>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.login-btn').on('click', function() {
                alert('Inloggen knop is geklikt!');
            });
        });
    </script>
</body>
</html>
