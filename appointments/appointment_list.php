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
<head>
    <meta charset="UTF-8">
    <title>Caprivi Healthcare Research</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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