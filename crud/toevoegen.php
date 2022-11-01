<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Film toevoegen</title>

    <!-- CSS LINKS -->
    <link rel="stylesheet" href="styles/main.css">

    <!-- JS LINKS -->
    <script src="scripts/countdown.js" defer></script>
</head>
<body>

    <div class="header" style="z-index: 2;">
        <div class="nav">
            <a href="home.php"><img src="media/logomovie.PNG" alt="png"></a>
            <div class="tickets-"><a href="overzicht.php">Overzicht</a></div>
            <div class="contact"><a href="toevoegen.php">Toevoegen</a></div>
        </div>
    </div>


    <img src="media/HGHGHGHGHGHGHGHGHG.PNG" alt="">


    <div class="intro">
    <form id="nieuweStudent">
     
          <h2>Film toevoegen</h2>  <br>
            <label for="studentNaam">Naam film:</label>
            <input type="text" name="studentNaam" id="filmNaam" required >
            <br>

            <label for="studentNummer">Beoordeling:</label>
            <input type="number" name="studentNummer" id="beoordeling" required >
            <br>

            <label for="beschrijving">Beschrijving:</label>
            <input type="text" name="beschrijving" id="beschrijving" required >
            <br>

            <input type="submit" value="Opslaan"><br>
     
    </form>

</div>

    <script src="../script/script.js"></script>
  
    <div class="footer">
        <div class="d1b">2022 © beste studenten van D2C</div>
        <div class="powerd">Powerd by Johan Thijen</div>
    </div>
</body>
</html>