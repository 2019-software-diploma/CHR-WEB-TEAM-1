<?php

 	session_start();
	
	if (!isset($_SESSION['userName'])) {
		header("Location: ../login/logoff.php?sessiondone=1");
		die();	
	}
	
	require "../main/dbConnectionCHR.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Caprivi Healthcare Research</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<?php
	include('../main/menu.php');
?>
<div class="container-fluid" >

<h4 align="center">Staff Member</h4>
<?php
    if (!empty($_POST['appointmentid']))
    { 
		$Appointment_ID = trim($_POST['appointmentid']);
        $First_Name = trim($_POST['First_Name']);
        $Surname = trim($_POST['Surname']);		
		$Phone_Number = trim($_POST['Phone_Number']);
        $Staff_Number = trim($_POST['Staff_Number']);
		$Appointment_Time = trim($_POST['Appointment_Time']);
        $Appointment_Date = trim($_POST['Appointment_Date']);        
        $Summary = trim($_POST['Summary']);        


       //update the record
        $sql = "UPDATE appointments 
            SET First_Name = '$First_Name', 
                Surname = '$Surname', 
				Phone_Number = '$Phone_Number',
                Staff_Number = '$Staff_Number',
                Appointment_Time = '$Appointment_Time',
                Appointment_Date = '$Appointment_Date',
                Summary = '$Summary'
            WHERE Appointment_ID = $Appointment_ID";
		
        $result = mysqli_query($conn, $sql) or die("Error updating record ".mysqli_error($conn));

        $numrows = mysqli_affected_rows($conn);

        if ($numrows == 1)
        {
            echo "Appointment details have been updated successfully!<br><br>";
            echo "<a href='appointment_list.php' class='btn btn-primary btn-sm'>Back to appointment list</a>";  
        }
        else
        {
            echo "Appointment update failed. $numrows were updated"; 
            echo "&nbsp;&nbsp;&nbsp";
            echo "<a href='../appointments/appointment_list.php' class='btn btn-secondary btn-sm' role='button' >Appointment List</a>";
        }

    }
    else
    {
        echo "You must supply all the Appointment Number!<br><br>";
        echo "<a href='#' onclick='window.history.go(-1); return false;' class='btn btn-secondary btn-sm' role='button' >Go Back</a>";
        echo "&nbsp;&nbsp;&nbsp";
        echo "<a href='../appointments/appointment_list.php' class='btn btn-secondary btn-sm' role='button' >Appointment List</a>";
    }

?>

<br><br>


</div>
<?php
	include('../main/footer.php');
?>
</body>
</html>