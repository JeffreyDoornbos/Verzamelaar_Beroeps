<?php
// voeg database verbinding toe
require 'config.php';

// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}

// maak query
$query = "SELECT * FROM films";
// voer de query uit en vang he resultaat op
$result = mysqli_query($mysqli, $query);
// als er geen resultaat is dan is er iets fout gegaan
if (!$result)
{
    echo "<p>FOUT!</p>";
    echo "<p>" . $query . "</p>";
    echo "<p>" . mysqli_error($mysqli) . "</p>";
    exit;
}
// als er records zijn
if (mysqli_num_rows($result) > 0)
{
    // zolang er items uit te lezen zijn...
    while ($item = mysqli_fetch_assoc($result))
    {
        // toon de gegevens van het item
        echo $item['filmNaam'] . " - ";
        echo $item['beoordeling'] . " - ";
        echo $item['beschrijving'] . " - ";
        echo $item['image'] . "<br/>";
    }
}

//als er geen records zijn...
else
{
    echo "<p>Geen items gevonden!</p>";
}