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
<?php
	include('../main/head.php');
?>
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