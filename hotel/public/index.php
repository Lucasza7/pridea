<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../stylesheets/homepage.css">
    <title>Hotel Ter Duin - Welkom</title>
    <style>
        body {
            background-image: url('../images/achtergrond.jpeg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-color: #f5f7fa;
        }
        .header {
            background: linear-gradient(135deg, #3498db, #2c3e50);
            padding: 3rem;
        }
        .header h1 {
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            font-size: 2.5em;
        }
        .header p {
            color: #ecf0f1;
            font-size: 1.2em;
        }
        .navbar {
            background: linear-gradient(to right, #2980b9, #3498db);
        }
        .navbar li a:hover {
            background-color: #2c3e50;
            transform: scale(1.05);
        }
        .kamer-type {
            background: white;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            border-radius: 10px;
        }
        .kamer-type:hover {
            transform: translateY(-5px);
        }
        .kamer-type h3 {
            color: #2980b9;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
        }
        .prijs {
            color: #e74c3c;
            font-weight: bold;
            font-size: 1.2em;
        }
        .services {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        section h2 {
            color:rgb(255, 255, 255);
            text-align: center;
            margin-bottom: 30px;
            position: relative;
        }
        section p {
            color: white;
        }
        section h2:after {
            content: '';
            display: block;
            width: 50px;
            height: 3px;
            background: #3498db;
            margin: 10px auto;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Welkom bij Hotel Ter Duin</h1>
        <p>Uw luxe verblijf aan de Nederlandse kust</p>
    </div>

    <nav class="navbar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="login.php">Inloggen</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="reservering.php">Reserveren</a></li>
        </ul>
    </nav>

    <div class="container">
        <section>
            <h2>Over ons</h2>
            <p>Hotel Ter Duin is een sfeervol hotel waar comfort en luxe samenkomen. Gelegen in een prachtige omgeving 
            aan de Nederlandse kust bieden wij u een onvergetelijk verblijf met uitstekende service en moderne faciliteiten. 
            Geniet van onze spa faciliteiten, het uitstekende restaurant en de adembenemende uitzichten over de duinen.</p>
        </section>

        <section>
            <h2>Onze Kamers & Tarieven</h2>
            <div class="kamer-types">
                <div class="kamer-type">
                    <h3>One-Bedroom</h3>
                    <p class="prijs">€75,- per nacht</p>
                    <p>Comfortabele kamer met alle basis voorzieningen voor een aangenaam verblijf.</p>
                    <ul>
                        <li>Tweepersoonsbed</li>
                        <li>Eigen badkamer</li>
                        <li>TV en gratis WiFi</li>
                        <li>20m² oppervlakte</li>
                        <li>Inclusief ontbijt</li>
                    </ul>
                </div>

                <div class="kamer-type">
                    <h3>Two-Bedroom</h3>
                    <p class="prijs">€120,- per nacht</p>
                    <p>Ruime kamer met twee slaapkamers voor families of groepen.</p>
                    <ul>
                        <li>Twee slaapkamers</li>
                        <li>Gedeelde badkamer</li>
                        <li>TV en gratis WiFi</li>
                        <li>35m² oppervlakte</li>
                        <li>Inclusief ontbijt</li>
                    </ul>
                </div>

                <div class="kamer-type">
                    <h3>Luxe-Bedroom</h3>
                    <p class="prijs">€180,- per nacht</p>
                    <p>Luxe kamer met extra voorzieningen voor optimaal comfort.</p>
                    <ul>
                        <li>Groot tweepersoonsbed</li>
                        <li>Luxe badkamer met bad</li>
                        <li>Minibar</li>
                        <li>Zithoek</li>
                        <li>40m² oppervlakte</li>
                        <li>Inclusief ontbijt en welkomstdrankje</li>
                    </ul>
                </div>

                <div class="kamer-type">
                    <h3>King-Suit</h3>
                    <p class="prijs">€250,- per nacht</p>
                    <p>Onze meest exclusieve accommodatie voor een onvergetelijk verblijf.</p>
                    <ul>
                        <li>Aparte woon- en slaapkamer</li>
                        <li>Luxe badkamer met jacuzzi</li>
                        <li>Privé balkon met zeezicht</li>
                        <li>Champagne bij aankomst</li>
                        <li>50m² oppervlakte</li>
                        <li>Inclusief ontbijt, parkeren en spa toegang</li>
                    </ul>
                </div>
            </div>
        </section>

        <section>
            <h2>Extra Services</h2>
            <div class="services">
                <ul>
                    <li>Spa toegang: €25,- per persoon per dag</li>
                    <li>Parkeren: €15,- per dag</li>
                    <li>Laat uitchecken (tot 15:00): €30,-</li>
                    <li>Romantisch diner arrangement: €75,- per persoon</li>
                    <li>Fietsverhuur: €15,- per dag</li>
                </ul>
            </div>
        </section>

        
    </div>
</body>
</html>
