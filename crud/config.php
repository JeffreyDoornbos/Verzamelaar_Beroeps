<?php
// foutmelsing zichtbaar maken
ini_set('display_errors', 1);
error_reporting(E_ALL);

// database logingegevens
$db_hostname = '127.0.0.1';
$db_username = '88299';
$db_password = 'Zoetermeer1';
$db_database = 'DB_verzamelaar';

// maak de database verbinding
$mysqli = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

// als de verbinding niet gemaakt kan worden: geef een melding
if (!$mysqli) {
    echo "FOUT: geen connectie naar database. <br>";
    echo "ERROR: " . mysqli_connect_error() . "<br/>";
    exit;
}