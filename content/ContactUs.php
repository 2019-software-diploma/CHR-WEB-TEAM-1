<?php
/**
 * Author: Edgar Hernandez
 * Date: 01/05/2019
 * Purpose: List of Staff
 */	
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

<h4 align="center">List of Our Branches</h4>
<div align="center" width="90%"></div>
<table class="table table-striped table-sm" align="center">
	<thead class="thead-dark">
	<tr>
		<th scope="col">Branch Name</th>
		<th scope="col">Address</th>
		<th scope="col">Telephone</th>
	</tr>
	</thead>
	<tbody>
	<?php
	
	$SQL = "SELECT * FROM branches";
	$result = mysqli_query($conn, $SQL);
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>" . $row['Branch_Name'] . "</td>";
			echo "<td>" . $row['Address'] . "</td>";
			echo "<td>" . $row['Branch_Telephone'] . "</td>";
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

</div>

<?php
	include('../main/footer.php');
?> 

</body>
</html>