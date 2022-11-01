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
            <div class="tickets-"><a href="overzicht.php.php">Overzicht</a></div>
            <div class="contact"><a href="toevoegen.php">Toevoegen</a></div>
        </div>
    </div>


    <img src="media/HGHGHGHGHGHGHGHGHG.PNG" alt="">


    <div class="intro">
    <form name="filmForm" method="post" action="stuurfilms.php" enctype="multipart/form-data">
        <table>
            <th><h2>Voeg een film toe</h2></th>
            <tr>
                <td>Film naam: </td>
                <td><input type="text" name="filmNaam" id="beschrijving" maxlength="10" required></td>
            </tr>
            <tr>
                <td>Beoordeling: </td>
                <td><input type="number" name="beoordeling" id="bescrijving" value="0" max="10" required></td>
            </tr>
            <tr>
                <td>Beschrijving: </td>
                <td><input type="text" name="beschrijving" id="beschrijving" maxlength="250" required></td>
            </tr>
            <tr>
                <td><input type="file" name="image[]" /></td>
            </tr>
            <tr>
                <td> </td>
                <td><input type="submit" name="verzend" value="Voeg toe aan je collectie"></td>
            </tr>
        </table>
    </form>
    </div>

    <script src="../script/script.js"></script>
  
    <div class="footer">
        <div class="d1b">2022 © beste studenten van D2C</div>
        <div class="powerd">Powerd by Johan Thijen</div>
    </div>
</body>
</html>