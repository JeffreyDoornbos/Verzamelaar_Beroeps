<?php 
// Voeg de database-verbinding toe
require 'config.php';

$query = "SELECT * FROM DB_verzamelaar";

$result = mysqli_query($mysqli, $query);

if (!$result) {
    echo "<p>FOUT!<p>";
    echo "<p>" . $query . "<p>";
    echo "<p>" . mysqli_error($mysqli) . "<p>";
    exit;
}

// Als er records zijn...
if (mysqli_num_rows($result) > 0) {
    // maak een tabel
    echo "<table border='1px'>";
    // eerst de headers van de tabel:
    echo "<tr><th>Onderwerp</th><th>Inhoud</th><th>Detail</th><th>Verwijder</th><th>Update</th></tr>";

    // zolang er items uit te lezen zijn...
    while ($item = mysqli_fetch_assoc($result)) {
        echo "<tr>";
            echo "<td>" . $item['Onderwerp'] . "</td>";
            echo "<td>" . $item['Inhoud'] . "</td>";
            echo "<td><a href='detail.php?id=". $item['ID'] . "'>Detail</a>";
            echo "<td><a href='verwijder.php?id=" . $item['ID'] . "'>Verwijder</a>";
            echo "<td><a href='pasaan.php?id=" . $item['ID'] . "'>Update</a>";
        echo "</tr>";


    }
    echo "</table>";
    // Als er geen records zijn
} else {
    echo "<p>Geen items gevonden!</p>";
}

echo "<a href='toevoegForm.html'>Nieuwe toevoegen</a>";

?>