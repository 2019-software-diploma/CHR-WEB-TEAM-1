<?php
/**
 * Author: Edgar Hernandez
 * Date: 01/05/2019
 * Purpose: List of Staff
 */
	session_start();
	
	//If session variable has done we move to log-off page.
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

	<h4 align="center">Staff List</h4>
	<div align="center" width="90%"></div>
    <table class="table table-striped table-sm" align="center">
		<thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">First_Name</th>
            <th scope="col">Position</th>
            <th scope="col">Gender</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">Department</th>
            <th scope="col">Office Number</th>
			<th scope="col">Branch</th>
			<th scope="col">Email</th>
			<th scope="col">Actions</th>
        </tr>
		</thead>
		<tbody>
        <?php
		
		$SQL = "SELECT * FROM staff";
        $result = mysqli_query($conn, $SQL);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['Staff_Number'] . "</td>";
                echo "<td>" . $row['First_Name'] . " " . $row['Surname'] . "</td>";
                echo "<td>" . $row['Position'] . "</td>";
                echo "<td>" . $row['Gender'] . "</td>";
                echo "<td>" . $row['Date_of_Birth'] . "</td>";
                echo "<td>" . $row['Department'] . "</td>";
                echo "<td>" . $row['Office_Number'] . "</td>";
                echo "<td>" . $row['Branch_Number'] . "</td>";
                echo "<td>" . $row['Email'] . "</td>";	
                echo "<td align=center>
                    <a class='btn btn-outline-warning btn-sm' href=\"staff_edit.php?staffnumber=" . $row['Staff_Number'] . "\">Edit</a>&nbsp;&nbsp;&nbsp;
                    
                    <a class='btn btn-outline-danger btn-sm' href=\"staff_delete.php?staffnumber=" . $row['Staff_Number'] . "\" onclick=\"return confirm('Are you sure?');\">Delete</a>&nbsp;&nbsp;&nbsp;
					</td>";
                echo "</tr>";
            }
        } 
		else 
		{
            echo "0 Results";
        }
        ?>
		</tbody>
    </table>
    <a href="staff_new.php" class="btn btn-primary btn-sm">New Staff Member</a>

</div>
<?php
	include('../main/footer.php');
?>
</body>
</html>
