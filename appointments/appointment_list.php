<?php

	session_start();
	
	if (!isset($_SESSION['userName'])) {
		header("Location: ../login/logoff.php?sessiondone=1");
		die();	
	}
	$staffNumber = $_SESSION['staffNumber'];
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

	<h4 align="center">Appointment List</h4>
	<div align="center" width="90%"></div>
    <table class="table table-striped table-sm" align="center">
		<thead class="thead-dark">
        <tr align="center">
            <th scope="col" >Appointment ID</th>
            <th scope="col" >Name</th>
            <th scope="col" >Phone Number</th>
            <th scope="col" >Appointment Time</th>
            <th scope="col" >Appointment Date</th>
            <th scope="col" >Summary</th>
			<th scope="col" >Actions</th>
        </tr>
		</thead>


		<tbody>
        <?php
		
		$SQL = "SELECT * FROM appointments ";
        $result = mysqli_query($conn, $SQL);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['Appointment_ID'] . "</td>";
                echo "<td>" . $row['First_Name'] . " " . $row['Surname'] . "</td>";
                echo "<td>" . $row['Phone_Number'] . "</td>";
                echo "<td>" . $row['Appointment_Time'] . "</td>";
                echo "<td>" . $row['Appointment_Date'] . "</td>";
                echo "<td>" . $row['Summary'] . "</td>";

                echo "<td align=center>
                    <a class='btn btn-outline-warning btn-sm' href=\"appointment_edit.php?appointmentid=" . $row['Appointment_ID'] . "\">Edit</a>&nbsp;&nbsp;&nbsp;
                    
                    <a class='btn btn-outline-danger btn-sm' href=\"appointment_delete.php?appointmentid=" . $row['Appointment_ID'] . "\" onclick=\"return confirm('Are you sure?');\">Delete</a>&nbsp;&nbsp;&nbsp;
                    </td>";
                echo "</tr>";
            }
        } 
		else 
		{
            echo "You have 0 Appointments Pending";
        }
        ?>
		</tbody>
    </table>


<?php
	include('../main/footer.php');
?>
</body>
</html>