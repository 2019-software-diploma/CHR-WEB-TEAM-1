<?php
/**
 * Author: Edgar Hernandez
 * Date: 01/05/2019
 * Purpose: Page to allow a staff member to create new staff and edit existing ones.
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
<?php
	include('../main/menu.php');
?>
<div class="container-fluid" >

    <h4 align="center">New Staff Member</h4>
    
    <form name="staff" class="container-fluid needs-validation" action="../staff/staff_insert.php" method="POST" novalidate>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="First_Name">Name</label>
          <input type="First_Name"  name="First_Name" class="form-control" placeholder="Name" required>
        </div>
        <div class="form-group col-md-6">
          <label for="Surname">Surname</label>
          <input type="Surname" name="Surname" class="form-control" placeholder="Surname" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="Position">Position</label>
          <input type="Position" name="Position" class="form-control" placeholder="Position" required>
        </div>
        <div class="form-group col-md-6">
          <label for="Department">Department</label>
          <input type="Department" name="Department" class="form-control" placeholder="Department" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="Office_Number">Office Number</label>
          <input type="Office_Number" name="Office_Number" class="form-control" placeholder="Office Number" required>
        </div>
        <div class="form-group col-md-6">
          <label for="Branch_Number">Branch Name</label>
          <select name="Branch_Number" name="Branch_Number" class="form-control">
          <?php
            $sql = "SELECT branch_number, branch_name FROM branches ORDER BY branch_name";
            $result = mysqli_query($conn, $sql) or die("Error reading branches - ".mysqli_error($conn));
            while ($row = mysqli_fetch_array($result))
            {
                if ($branch_number == $row[branch_number]) 
                  echo "<option value=\"$row[branch_number]\" selected>$row[branch_name]</option>"; 
                else 
                  echo "<option value=\"$row[branch_number]\">$row[branch_name]</option>";
            }
          ?>
          </select>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="Gender">Gender</label>
          <select name="Gender" name="Gender" class="form-control" placeholder="Gender" type="Gender">
                <option value="M" >Male</option>
                <option value="F" >Female</option>
                <option value="O" >Other</option>
	            </select>
        </div>
        <div class="form-group col-md-6">
          <label for="Date_of_Birth">Date of Birth</label>
          <input type="date" class="form-control" name="Date_of_Birth" id="Date_of_Birth" placeholder="DD/MM/YYYY" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="Email" id="Email" aria-describedby="emailHelp" placeholder="Enter email" required>
        </div>
        <div class="form-group col-md-6">
          <label for="Password">Password</label>
          <input type="password" class="form-control" name="Password" id="Password" placeholder="Password" maxlength="6" required>
        </div>
      </div>      
      <div >

      <button type="submit" class="btn btn-success btn-sm">Submit</button>

      <a href="../staff/staff_list.php" class="btn btn-secondary btn-sm" role="button" >Staff List</a>

      <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';
        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
      </script>
      <div>
      <br>
    </form>

</div>
<?php
	include('../main/footer.php');
?>
</body>
</html>