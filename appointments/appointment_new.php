<?php 
require '../main/dbConnectionCHR.php'; 

	$sql = "SELECT * FROM `staff`";
	$result = mysqli_query($conn, $sql)or die("Error reading staff database - ". mysqli_error($conn)); 
		
?>
<!DOCTYPE html>
<html lang="en">
<?php
	include('../main/head.php');
?>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {
$( "#Date" ).datepicker();
} );
</script>
<body>
<?php
	include('../main/menu.php');
?>
	<h1>Make Appointment</h1>
	
		<form action="appointment_insert.php" method="post">
		
		
		<table border="0">
			<tr><td><p>First Name:<br /><input name="First_Name" type="text"></p></td>
			<td><p>Surname:<br /><input name="Surname" type="text"></p></td>
			<td><p>Phone Number:<br /><input name="Phone_Number" type="text"></p></td></tr>
			
			<tr><td colspan="3" ><p>Reason For Appointment:<br /><input name="Summary"  maxlength="500" height="50" width="100"></td></tr>
			
			<tr><td><p>Staff No:<br /><select name="StaffID" >
			
			<?php
	
			
			
			
			if (mysqli_num_rows($result) > 0) 
				{
					while($row = mysqli_fetch_array($result)) 
					{
						echo "<option value=" . $row['Staff_Number'] . ">" . $row['First_Name'] . $row['Surname'] . "</option>";
						
					}
				}
				
				
				
			 mysqli_close($conn);
			?>
			</select></p></td>
			
			
			<td><p>Date:<br /><input type="text" name="Date" id="Date"></p></td>
			<td><p>Time:<br /><select name="Time">
					<option value="9:00">9:00am</option>
					<option value="9:30">9:30am</option>
					<option value="10:00">10:00am</option>
					<option value="10:30">10:30am</option>
					<option value="11:00">11:00am</option>
					<option value="11:30">11:30am</option>
					<option value="13:00">1:00pm</option>
					<option value="13:30">1:30pm</option>
					<option value="14:00">2:00pm</option>
					<option value="14:30">2:30pm</option>
					<option value="15:00">3:00pm</option>
					<option value="15:30">3:30pm</option>
					<option value="16:00">4:00pm</option>
					<option value="16:30">4:30pm</option>
					
				</select></p></td>
			</tr>


		</table>
		<input type="submit" value="Create Appointment">
		</form>
<?php
	include('../main/footer.php');
?> 
</body>
</html>
