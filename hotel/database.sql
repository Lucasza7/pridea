verander alles want dit is mijn sql:

-- Database aanmaken
USE HotelTerDuin;

-- Klanten tabel
CREATE TABLE Klant (
    klant_id INT AUTO_INCREMENT PRIMARY KEY,
    naam VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    telefoonnummer VARCHAR(20)
);

-- Kamers tabel
CREATE TABLE Kamer (
    kamer_id INT AUTO_INCREMENT PRIMARY KEY,
    kamernummer INT UNIQUE NOT NULL,
    type ENUM('one-bedroom','two-bedroom','luxe-bedroom','king-suit') NOT NULL,
    prijs DECIMAL(10,2) NOT NULL
);

-- Reserveringen tabel
CREATE TABLE Reservering (
    reservering_id INT AUTO_INCREMENT PRIMARY KEY,
    klant_id INT NOT NULL,
    kamer_id INT NOT NULL,
    check_in DATETIME NOT NULL,
    check_out DATETIME NOT NULL,
    status ENUM('geboekt', 'geannuleerd') DEFAULT 'geboekt',
    FOREIGN KEY (klant_id) REFERENCES Klant(klant_id) ON DELETE CASCADE,
    FOREIGN KEY (kamer_id) REFERENCES Kamer(kamer_id) ON DELETE CASCADE
);

-- Medewerkers tabel
CREATE TABLE Medewerker (
    medewerker_id INT AUTO_INCREMENT PRIMARY KEY,
    naam VARCHAR(100) NOT NULL,
    gebruikersnaam VARCHAR(50) UNIQUE NOT NULL,
    wachtwoord VARCHAR(255) NOT NULL -- Wachtwoord moet gehasht opgeslagen worden
);

-- Alarm tabel
CREATE TABLE Alarm (
    alarm_id INT AUTO_INCREMENT PRIMARY KEY,
    datum DATE NOT NULL,
    aantal_beschikbare_kamers INT NOT NULL
);
