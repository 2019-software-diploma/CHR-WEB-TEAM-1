<?php 
	if (empty($_POST['firstname']) || empty($_POST['password']))
		die("You need to enter a firstname and a password.");
	$firstname = $_POST['firstname'];
	$password = $_POST['password'];
	
	require 'ConnectDB.php'; 

	$sql = "SELECT User_level FROM staff WHERE First_Name='$firstname' AND Password='$password'";
	$result = mysqli_query($conn, $sql) or die("Error reading users - ".mysqli_error($conn));
	$numrows = mysqli_num_rows($result);

	if ($numrows == 1)
	{
		//get the username
		$row = mysqli_fetch_array($result);
		$User_level = $row[0];
		session_name('myapp');
		session_start(); 
		$_SESSION['firstname'] = $firstname;
		$_SESSION['User_level'] = $User_level;
		echo "<h1>Welcome $firstname</h1>";
		echo "<h2>You have successfully logged in</h2>";
		echo '<a href="memberpage.php">Click here for the Member status page</a>';
	}
	else
	{
		echo 'The firstname or password was incorrect';
		session_name('myapp');
		session_start();
		session_unset();
	}
	$_SESSION['start'] = time();
	$_SESSION['expire'] = $_SESSION['start'] + (30*60);
?>