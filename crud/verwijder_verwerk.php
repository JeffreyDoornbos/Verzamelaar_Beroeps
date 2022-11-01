<?php 

    require "config.php";

    $id = $_GET['id'];

    echo "Item met ID " . $id . " wordt verwijderd....<br>";

    $query = "DELETE FROM verprog1_agenda WHERE ID = " . $id;

    $result = mysqli_query($mysqli, $query);

    if ($result) {
        echo "Het item is verwijderd<br>";

    } else {
        echo "FOUT bij verwijderen<br>";
        echo $query . "<br>";
        echo mysqli_error($mysqli);
    }

    // Terug naar het overzicht
    echo "<a href='toonagenda.php'>Terug</a>";


?>