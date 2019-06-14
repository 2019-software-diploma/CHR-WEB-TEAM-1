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
<body>
<?php
	include('../main/menu.php');
?>
<div class = "container">
	<div class="jumbotron small">
		<h1>Make Appointment</h1>
	</div>
		<form action="appointment_insert.php" method="post" novalidate>
		
		
			<div class="row">
				<div class="form-group col"><p>First Name:<br />
					<input class="form-control" name="First_Name" type="text" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
					</p></div>
				<div class="form-group col"><p>Surname:<br />
					<input class="form-control" name="Surname" type="text" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
					</p></div>
				<div class="form-group col"><p>Phone Number:<br />
					<input class="form-control" name="Phone_Number" type="text" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
					</p></div>
			</div>
			
			<div class="row">
				<div class="form-group col">
					<label for="Summary">Reason For Appointment:</label>
					<textarea class="form-control" id="Summary" name="Summary" rows="3" ></textarea>
				</div>
			</div>
			
			
			<div class="row">
				<div class="form-group col">
					<label for="StaffID">Staff No:</label>
					<select class="form-control" name="StaffID" id="StaffID" >
					
			
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
					</select>
				</div>
			</div>
			
			<div class="row">
				<div class="form-group col">
					<label for="Date">Date:</label>
					<input class="form-control" type="text" name="Date" id="Date"></p>
				</div>
				<div class="form-group col">
					<label for="Time">Date:</label>
					<select class="form-control" name="Time" id="Time">
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
						
					</select></div>
			</div>

		<button type="submit" class="btn-primary btn-sm">Create Appointment</button>
		</form>
</div>
<?php
	include('../main/footer.php');
?> 
</body>
</html>
