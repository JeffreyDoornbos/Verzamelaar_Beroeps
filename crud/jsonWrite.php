<?php
// Lees de HTTP Request body
$json = file_get_contents('php://input');

// Converts it into a PHP object
$data = json_decode($json);

// Maak verbinding met de database
$db = new SQLite3("film.db");
$db->busyTimeout(5000);
 
// Maak de query om de nieuwe student weg te schrijven naar de database
$query = "INSERT INTO film (filmNaam, beoordeling, beschrijving) VALUES ('$data->filmNaam', '$data->beoordeling', '$data->beschrijving')";

// Voer de query uit tegen de Database
$db->exec($query);
