<?php
include 'conn.php';
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}

$id = $_GET['id'];
$view = "SELECT * from accounts where md5(id) = '$id'";
$result = $conn->query($view);
$row = $result->fetch_assoc();

if(isset($_POST['update'])){

	$ID = $_GET['id'];

	$fn = $_POST['fname'];
	$ln = $_POST['lname'];

	$insert = "UPDATE accounts set username = '$fn', email = '$ln' where md5(id) = '$ID'";
	
	if($conn->query($insert)== TRUE){

			echo "Sucessfully update data";
			header('location:home.php');			
	}else{

		echo "Ooppss cannot add data" . $conn->error;
		header('location:home.php');
	}
	$conn->close();
}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="mycss.css">
		<title>
			This is Sample
		</title>
		</head>
	<body>

			<div id="content">
				<form action="" method="POST">
				<table align="center">
					<tr>
						<td>Fisrt Name: <input type="text" name="fname" value="<?php echo $row['username'];?>" placeholder="Type Firstname here" required></td>
						</tr>
						<tr>
							<td>Last Name: <input type="text" name="lname"  value="<?php echo $row['email'];?>" placeholder="Type Last Name here.." required></td>
						</tr>
						<tr>
							<td><input type="submit" name="update" value="Update"></td>
						</tr>
				</table>
			</form>
				<br>
			
			</div>
		</div>
		</body>

</html>