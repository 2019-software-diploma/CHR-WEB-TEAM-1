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