<?php
/**
 * Author: Edgar Hernandez
 * Date: 01/05/2019
 * Purpose: Login of the Web Portal
 */
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
<div class="container-fluid">
<?php
	// Validate entered password with SHAed password in the database
	// If they match, set the Session variable: username
	// In future if this Session variable is set, we assume a valid password has been entered.
	if (empty($_GET['manageportal']))
	{
		if (empty($_POST['InputEmail']) || empty($_POST['InputPassword']))
		{
			echo("You need to enter a username and a password.");
		}
		else
		{
			$email = $_POST['InputEmail'];
			$password = $_POST['InputPassword'];
			
			//open the server connection
			require '../main/dbConnectionCHR.php';
			
			//Check to see if a valid username & password exists
			$sql = "SELECT user_level, First_Name, staff_number FROM staff WHERE email='$email' AND password=SHA('$password')";
			
			$result = mysqli_query($conn, $sql) or die("Error reading users - ".mysqli_error($conn));
			$numrows = mysqli_num_rows($result);
			//there should be exactly one row with the correct username and password
			if ($numrows == 1)
			{
				//Get the username
				$row = mysqli_fetch_array($result);
				$userLevel = $row[0];
				$userName = $row[1];
				$staffNumber = $row[2];
				
				$_SESSION['start'] = time(); // Recording logged in time.
				// Ending a session in 30 minutes from the starting time.
				$_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
				
				$_SESSION['email'] = $email;
				$_SESSION['userName'] = $userName;
				$_SESSION['staffNumber'] = $staffNumber;
				
				include('../main/menu.php');
				echo "<div align=center><br/>";		
				echo "<h1>Welcome $userName</h1>";
				echo "<h3>You have successfully logged in</h3>";
				echo "<br>";
				echo "<h5>Please select an option to manage this site:</h5>";
				echo "<h6><a href='../staff/staff_list.php'>Staff</a></h6>";
				echo "<h6><a href='../journals/journals_list.php'>Journals</a></h6>";
				echo "<h6><a href='../appointments/appointment_list.php'>Appointments</a></h6>";
				echo "<br><br><h6><a href='../login/logoff.php'>Logoff</a></h6>";
				echo "<br></div>";
			}
			else
			{
				echo 'The email or password was incorrect!';
				session_unset();
			}
		}
	}
	else
	{
		echo "<div align=center><br/>";		
		echo "<br>";
		echo "<h5>Please select an option to manage this site:</h5>";
		echo "<h6><a href='../staff/staff_list.php'>Staff</a></h6>";
		echo "<h6><a href='../journals/journals_list.php'>Journals</a></h6>";
		echo "<h6><a href='../appointments/appointment_list.php'>Appointments</a></h6>";
		echo "<br><br><h6><a href='../login/logoff.php'>Logoff</a></h6>";
		echo "<br></div>";
	}
?>
</div>	

<?php
	include('../main/footer.php');
?>
</body>
</html>