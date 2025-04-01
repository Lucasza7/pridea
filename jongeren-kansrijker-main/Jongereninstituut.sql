create database Jongereninstituut;
use Jongereninstituut;

-- Medewerkers tabel
CREATE TABLE medewerkers (
    medewerker_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Jongeren tabel
CREATE TABLE jongeren (
    jongere_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    dateofBirth DATE NOT NULL,
    email VARCHAR(100),
    telefoonnummer VARCHAR(15),
    adres VARCHAR(100),
    zipcode VARCHAR(10),
    state VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Instituten tabel
CREATE TABLE instituten (
    instituut_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    adres VARCHAR(100),
    zipcode VARCHAR(10),
    city VARCHAR(50),
    phonenumber VARCHAR(15),
    email VARCHAR(100),
    contactperson VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Activiteiten tabel
CREATE TABLE activiteiten (
    activiteit_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    bio TEXT,
    date DATE,
    time TIME,
    location VARCHAR(100),
    max_participants INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Jongeren_Activiteiten koppeltabel
CREATE TABLE jongeren_activiteiten (
    jongere_id INT,
    activiteit_id INT,
    appplication_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (jongere_id) REFERENCES jongeren(jongere_id) ON DELETE CASCADE,
    FOREIGN KEY (activiteit_id) REFERENCES activiteiten(activiteit_id) ON DELETE CASCADE,
    PRIMARY KEY (jongere_id, activiteit_id)
);

-- Jongeren_Instituten koppeltabel (plaatsingen)
CREATE TABLE jongeren_instituten (
    jongere_id INT,
    instituut_id INT,
    postingdate DATE NOT NULL,
    end_date DATE,
    status ENUM('active', 'finished', 'dropout') DEFAULT 'active',
    FOREIGN KEY (jongere_id) REFERENCES jongeren(jongere_id) ON DELETE CASCADE,
    FOREIGN KEY (instituut_id) REFERENCES instituten(instituut_id) ON DELETE CASCADE,
    PRIMARY KEY (jongere_id, instituut_id, postingdate)
);

SELECT * From instituten;
