<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Caprivi Healthcare Research</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="../js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="../js/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="../js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	
</head>
<body>
<?php
	include('../main/menu.php');
?>

<div class="container">
<?php
	// Validate entered password with SHAed password in the database
	// If they match, set the Session variable: username
	// In future if this Session variable is set, we assume a valid password has been entered.
	
	if (empty($_POST['InputEmail']) || empty($_POST['InputPassword']))
		die("You need to enter a username and a password.");
	
	$email = $_POST['InputEmail'];
	$password = $_POST['InputPassword'];
	
	//open the server connection
	require '../main/dbConnectionCHR.php';
	
	//Check to see if a valid username & password exists
	$sql = "SELECT user_level, concat_ws(' ', First_Name, Surname) as user_name FROM staff WHERE email='$email' AND password='$password'";
	
	$result = mysqli_query($conn, $sql) or die("Error reading users - ".mysqli_error($conn));
	$numrows = mysqli_num_rows($result);
	//there should be exactly one row with the correct username and password
	if ($numrows == 1)
	{
		//Get the username
		$row = mysqli_fetch_array($result);
		$userLevel = $row[0];
		$userName = $row[1];
		
		$_SESSION['start'] = time(); // Recording logged in time.
		// Ending a session in 30 minutes from the starting time.
		$_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
		
		$_SESSION['email'] = $email;
		$_SESSION['userName'] = $userName;
		
		echo "<h1>Welcome $userName</h1>";
		echo "<h2>You have successfully logged in</h2>";
	}
	else
	{
		echo 'The email or password was incorrect!';
	}
?>
</div>	

<?php
	include('../main/footer.php');
?>
</body>
</html>