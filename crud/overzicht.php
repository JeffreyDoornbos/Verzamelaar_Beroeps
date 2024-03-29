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
    
    <title>Film overzicht</title>

    <!-- CSS LINKS -->
    <link rel="stylesheet" href="styles/main.css">

    <!-- JS LINKS -->

</head>
<body>

    <div class="header" style="z-index: 2;">
        <div class="nav">
            <a href="home.php"><img src="media/logomovie.PNG" alt="png"></a>
            <div class="tickets-"><a href="overzicht.php">Overzicht</a></div>
            <div class="contact"><a href="toevoegen.php">Toevoegen</a></div>
            <div class="contact"><a href="verwijderfilm.php">Verwijder</a></div>

        </div>
    </div>



    <?php
// voeg database verbinding toe
require 'config.php';



// maak query
$query = "SELECT * FROM films WHERE UserID = " . $_SESSION['id'];
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

    ?>
    <div class="flex-box">
    <?php
    // zolang er items uit te lezen zijn...
    while ($item = mysqli_fetch_assoc($result))
    {
        ?>
        <div class="flex-in-flex-box">
            <img style="height:200px ;" src="upload/<?php echo $item['image'] ?>" alt="png/jpg">
            <h2><?php echo $item['filmNaam'] ?></h2>
            <h2>Beoordeling: <?php echo $item['beoordeling'] ?></h2>
            <h3 class="h3-box">Beschrijving: <br> <?php echo $item['beschrijving'] ?></h3>
        </div>

        <?php
    }
    ?>
    </div>
    <?php
}

//als er geen records zijn...
else
{
    echo "<p>Geen items gevonden!</p>";
}
?>

  
    <div class="footer">
        <div class="d1b">2022 © beste studenten van D2C</div>
        <div class="powerd">Powerd by Johan Thijen</div>
    </div>
</body>
</html>