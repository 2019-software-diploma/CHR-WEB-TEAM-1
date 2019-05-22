<?php
require '../main/dbConnectionCHR.php'; 
	$First_Name = $_POST['First_Name'];
    $Surname = $_POST['Surname'];
    $Phone_Number = $_POST['Phone_Number'];
	$StaffID = $_POST['StaffID'];
    $Date = strtotime($_POST['Date']);
	$NewDate = date('Y/m/d',$Date);
	$Time = $_POST['Time'];
	$Summary = $_POST['Summary'];
	
	
	$sql = "INSERT INTO `Appointments` VALUES (DEFAULT, '$First_Name', '$Surname', '$Phone_Number', '$StaffID', '$Time', '$NewDate', '$Summary')";
	echo $NewDate;
	echo $Time;
	echo $sql;
?>
<html>
	<head>
		<title>Make Appointment</title>
	</head>
	<body>
		<h1>Make Appointment</h1>
	<?php
	
	if (mysqli_query($conn, $sql))
	{
		if (mysqli_affected_rows($conn) == 1) 
		{
			echo "<p>Appointment made</p>";
		}
    } 
	else 
	{
        echo "<p>Error: " . mysqli_error($conn);
    }
	mysqli_close($conn);
	?>
	</body>
</html>
