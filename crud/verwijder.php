<?php
    // Lees het id uit de url
    $id = $_GET['id'];
    // Als er een id is...
    if ($id !="") {
        echo "Verwijder item met ID: " . $id . "<br>";

        echo "<p>Weet je het zeker?</php>";

        echo "<a href='verwijder_verwerk.php?id={$id}'> JA <a/> <br>";

    } else {
        echo "Geen ID gevonden...<br>";
    }

    // Terug naar het overzicht
    echo "<a href='toonagenda.php'>Terug</a>";

?>
