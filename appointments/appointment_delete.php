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
    if (!empty($_GET['appointmentid']))
    { 
        $appointmentid = trim($_GET['appointmentid']);

        //Delete the record
        $sql = "DELETE FROM appointments WHERE Appointment_ID = $appointmentid";

        $result = mysqli_query($conn, $sql) or die("Error updating record ".mysqli_error($conn));

        $numrows = mysqli_affected_rows($conn);

        if ($numrows == 1)
        {
            echo "Appointment deleted successfully!<br><br>";
            echo "&nbsp;&nbsp;&nbsp";
            echo "<a href='../appointments/appointment_list.php' class='btn btn-secondary btn-sm' role='button' >Appointment List</a>";
        }
        else
        {
            echo "Appointment delete failed. $numrows were updated"; 
            echo "&nbsp;&nbsp;&nbsp";
            echo "<a href='../appointments/appointment_list.php' class='btn btn-secondary btn-sm' role='button' >Appointment List</a>";
        }

    }
    else
    {
        echo "You must select an Appointment to be deleted!<br><br>";
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