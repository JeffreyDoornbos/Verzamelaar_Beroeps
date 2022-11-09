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
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Movie Database</h1>
                <a href="home.php"><i class="fas fa-user-circle"></i>Home</a>
				<a href="toevoegen.php"><i class="fas fa-user-circle"></i>Toevoegen</a>
				<a href="overzicht.php"><i class="fas fa-user-circle"></i>Overzicht</a>
				<a href="verwijderfilm.php"><i class="fas fa-user-circle"></i>Verwijder</a>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Home Page</h2>
			<p>Welkom terug, <?=$_SESSION['name']?>!</p> 
			<p>Dit is je beheerder pagina. <br>
			   Je kan hier je film collectie uitbereiden </p>
		</div>

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

				<form action="maintenance.php" method="POST">
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
				<br>
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