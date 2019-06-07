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
<?php
	include('../main/head.php');
?>
<body>
<?php
	include('../main/menu.php');
?>

<div class="container-fluid" >

	<h4 align="center">Staff List</h4>
	<div align="center" width="90%"></div>
    <table class="table table-striped table-sm" align="center">
		<thead class="thead-dark">
        <tr  align="center">
            <th scope="col" >ID</th>
            <th scope="col" >First_Name</th>
            <th scope="col" >Position</th>
            <th scope="col" >Gender</th>
            <th scope="col" >Date of Birth</th>
            <th scope="col" >Department</th>
            <th scope="col" >Office Number</th>
			<th scope="col" >Branch</th>
			<th scope="col" >Email</th>
			<th scope="col" >Actions</th>
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
