<?php
/**
 * Author: Edgar Hernandez
 * Date: 01/05/2019
 * Purpose: List of Staff
 */
require "dbConnectionCHR.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Caprivi Healthcare Research</title>
    <link href="css/Style.css" rel="stylesheet" type="text/css" />
	<Style>
	table, th, td {
		border: 1px solid black;
	}
	th {
		    background: lightgray;
	}
	</Style>
</head>
<body>
	<?php
		include('menu.php');
	?>
	<h3 align="center">Staff List</h3>
    <table width="100%">
        <tr>
            <th>ID</th>
            <th>First_Name</th>
            <th>Position</th>
            <th>Gender</th>
            <th>Date of Birth</th>
            <th>Department</th>
            <th>Office Number</th>
			<th>Branch</th>
			<th>Actions</th>
        </tr>
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
                echo "<td align=center>
					<a href=\"edit-book.php?bookid=" . $row['Staff_Number'] . "\">Edit</a>&nbsp;&nbsp;&nbsp;
					<a href=\"delete-staff.php?bookid=" . $row['Staff_Number'] . "\">Delete</a>
					</td>";
                echo "</tr>";
            }
        } else {
            echo "0 Results";
        }
        ?>
    </table>
    <p><a href="new-staff.php">New Staff Member</a></p>
	<?php
			include('footer.php');
		?>
</body>
</html>
