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
                margin-left: auto;
                margin-right: auto;
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

			<p>Welkom <?=$_SESSION['name']?>!</p> 
			<p>Dit is je beheerder pagina. <br>
			  Je kan hier alle films verwijderen en user aanpassen en verwijderen </p>


		<?php
include 'conn.php';


if(isset($_POST['add'])){

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];

	$insert = "insert into accounts (username,email) values ('$fname','$lname')";
	
	if($conn->query($insert)== TRUE){

			echo "Sucessfully add data";
			header('location:home.php');
	}else{

		echo "Ooppss cannot add data" . $conn->connect_error;
		header('location:home.php');
	}
	$insert->close();
}
?>


<link rel="stylesheet" type="text/css" href="mycss.css">
<style>
	tr,td{
		color:white;
	}
</style>
		
			<div id="content">

				<!-- <form action="maintenance.php" method="POST">
				<table align="center">
					<tr>
						<td>Username <input type="text" name="fname" value="" placeholder="Type Firstname here" required></td>
						</tr>
						<tr>
							<td>Email <input type="text" name="lname" placeholder="Type Last Name here.." required></td>
						</tr>
						<tr>
							<td><input type="submit" name="add" value="Add"></td>
						</tr>
				</table>
			</form>
				<br> -->

                <?php
                require 'config.php';

                $query = "SELECT * FROM `films`";
                
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
    echo "<table  border='1px'>";
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

				<table align="center" border="1" cellspacing="0" width="500">
					<tr>
					<th>username</th>
					<th>email</th>
					<th>Action</th>
					</tr>
					<?php
					$sql = "SELECT * FROM accounts";
					$result = $conn->query($sql);
					if($result->num_rows > 0){
					while($row = $result->fetch_array()){
						?>
						<tr>
							<td align="center"><?php echo $row['username'];?></td>
							<td align="center"><?php echo $row['email'];?></td>
							<td align="center"><a href="edit.php?id=<?php echo md5($row['id']);?>">Edit
							</a>/<a href="delete.php?id=<?php echo md5($row['id']);?>">Delete</a></td>
						</tr>
						<?php
							}	
						}else{
							echo "<center><p> No Records</p></center>";
						}
				
				$conn->close();
				?>
				</table>

               
			</div>
		</div>
	</body>
</html>