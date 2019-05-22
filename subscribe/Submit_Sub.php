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
    <style>
        .btn-primary, .btn-secondary, .btn-success {
            margin-top: 20px;
            margin-bottom: 50px;
        }
    </style>
</head>
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