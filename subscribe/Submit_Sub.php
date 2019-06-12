<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
	include('../main/head.php');
?>
<body>
<?php
	include('../main/menu.php');
?>

<div class="container">
	<div class="jumbotron small">
		<h1>Newsletter</h1>
		<p>Subscribing...</p> 
	</div>
	<?php
	if (!empty($_POST['name'])
		&& !empty($_POST['email']))
	{
		
		$name = trim($_POST['name']);
		$email = trim($_POST['email']);
		$address = trim($_POST['address']);
		$company = trim($_POST['company']);
		$profession = trim($_POST['profession']);
		$work = trim($_POST['work']);
		
		if (empty($name) || empty($email))
			die("Please input Require info");
		else
		{
			require '../main/dbConnectionCHR.php';
			$sql = "INSERT INTO subscribe (`Name`, `Email`, `Address`, `Company`, `Profession`, `WorkPosition`) VALUES('$name', '$email', '$address', '$company', '$profession', '$work')";
			$result = mysqli_query($conn, $sql) or die("Error updating record ".mysqli_error($conn));
			$numrows = mysqli_affected_rows($conn);

			if ($numrows == 1)
			echo "<h2>Your application has been completed! Thank you for submit.</h2>";
			else
			echo "<h2>Failed. Please retry.</h2>"; 
		
		}
	}
	else
	{
		die("You must supply all the Book details");
	}
	?>
	
		</div>	

		<?php
		
			include('../main/footer.php');
			//close db connection
			mysqli_close($conn);
		?>
	</body>
</html>