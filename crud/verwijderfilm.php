<?php 

// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
// Voeg de database-verbinding toe
require 'config.php';

$query = "SELECT * FROM `films` WHERE UserID = " . $_SESSION['id'];

$result = mysqli_query($mysqli, $query);

if (!$result) {
    echo "<p>FOUT!<p>";
    echo "<p>" . $query . "<p>";
    echo "<p>" . mysqli_error($mysqli) . "<p>";
    exit;
}





?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <style>
            tr,th{
                color: white;
                border-radius: 20px;
                text-align: center;
            }
        </style>
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Movie Database</h1>
                <a href="home.php"><i class="fas fa-user-circle"></i>Home</a>
				<a href="toevoegen.php"><i class="fas fa-user-circle"></i>Toevoegen</a>
				<a href="overzicht.php"><i class="fas fa-user-circle"></i>Overzicht</a>
				<a href="verwijderfilm.php"><i class="fas fa-user-circle"></i>Verwijder</a>
                <a href="beheerder.php"><i class="fas fa-user-circle"></i>Beheerder</a>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Verwijder Page</h2>
			<p>
			   Je kan hier je films verwijderen</p>

               <?php
        // Als er records zijn...
if (mysqli_num_rows($result) > 0) {
    // maak een tabel
    echo "<table border='1px'>";
    // eerst de headers van de tabel:
    echo "<tr><th>Film</th><th>Beoordeling</th><th>Verwijder</th></tr>";

    // zolang er items uit te lezen zijn...
    while ($item = mysqli_fetch_assoc($result)) {
        echo "<tr>";
            echo "<td>" . $item['filmNaam'] . "</td>";
            echo "<td>" . $item['beoordeling'] . "</td>";
            // echo "<td><a href='detail.php?id=". $item['ID'] . "'>Detail</a>";
            echo "<td><a href='verwijder.php?id=" . $item['id'] . "'>Verwijder</a>";
            // echo "<td><a href='pasaan.php?id=" . $item['ID'] . "'>Update</a>";
        echo "</tr>";


    }
    echo "</table>";
    // Als er geen records zijn
} else {
    echo "<p>Geen items gevonden!</p>";
}

?>
		</div>


	</body>
</html>