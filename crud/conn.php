<?php
	$server = "localhost";
	$username = "88299";
	$pass = "Zoetermeer1";
	$db = "movie_88299";

	//create connection 

	$conn = mysqli_connect($server,$username,$pass,$db);

	//check conncetion

	if($conn->connect_error){

		die ("Connection Failed!". $conn->connect_error);
	}

?>