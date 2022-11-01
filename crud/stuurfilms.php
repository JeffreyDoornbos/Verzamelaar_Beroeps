<?php

require_once 'config.php';

// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}


//is er een formulier verstuurd?
// -> check of de knop is verstuurd:
if (isset($_POST['verzend'])) {
    //lees alle velden uit en stop de waarden in een variabelen
    $naa = $_POST['filmNaam'];
    $beo = $_POST['beoordeling'];
    $bes = $_POST['beschrijving'];

    $output_dir = "upload/";/* Path for file upload */
	$RandomNum   = time();
	$ImageName      = str_replace(' ','-',strtolower($_FILES['image']['name'][0]));
	$ImageType      = $_FILES['image']['type'][0];
 
	$ImageExt = substr($ImageName, strrpos($ImageName, '.'));
	$ImageExt       = str_replace('.','',$ImageExt);
	$ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
	$NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
    $ret[$NewImageName]= $output_dir.$NewImageName;
	
	/* Try to create the directory if it does not exist */
	if (!file_exists($output_dir)) {
		@mkdir($output_dir, 0777);
	}

    move_uploaded_file($_FILES["image"]["tmp_name"][0], $output_dir."/".$NewImageName);

    //maak een toevoeg-query (let op de verschillende aanhalingtekens!)
    $query  = "INSERT INTO films";
    $query .= "(id, filmNaam, beoordeling, beschrijving, image)";
    $query .= "VALUES (NULL, '".$naa."', '".$beo."', '".$bes."', '".$NewImageName."')";

    //voer de query uit en vang het 'resultaat' op
    $result = mysqli_query($mysqli, $query);
    //controleer of het is gelukt
    if ($result) {
        echo "het item is toegevoegd<br/>";
    } else {
        echo "FOUT bij toevoegen</br>";
        echo $query . "</br>";          //tijdelijk (!) de query tonen
        echo mysqli_error($mysqli);     //tijdelijk (!) de foutmelding tonen
    }
    //terug naar het overzicht
    echo "<a href='toonfilms.php'>OVERZICHT</a>";
    

    //Test: toon de query op het scherm
    echo $query . "</br>";
    header('Location: toevoegen.php');
} else {
    echo "het formulier is niet (goed) verstuurd</br>";
}