<?php
/**
 * Author: Edgar Hernandez
 * Date: 01/05/2019
 * Purpose: Page to edit staff member
 */
 	session_start();
	
	//If session variable has done we move to log-off page.
	if (!isset($_SESSION['userName'])) {
		header("Location: ../login/logoff.php?sessiondone=1");
		die();	
	}
	
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

    <h4 align="center">Edit Staff Member</h4>
    
    <?php
    if (empty($_GET['staffnumber']))
    { 
        echo "You must supply the staff member to be edited!<br><br>";
        echo "<a href='#' onclick='window.history.go(-1); return false;' class='btn btn-secondary btn-sm' role='button' >Go Back</a>";
        echo "&nbsp;&nbsp;&nbsp";
        echo "<a href='../staff/staff_list.php' class='btn btn-secondary btn-sm' role='button' >Staff List</a>";
        die();
    }

    require "../main/dbConnectionCHR.php";
  
    $staffnumber = $_GET['staffnumber'];
    $SQL = "SELECT * FROM staff WHERE staff_number = " . $staffnumber;
    $result = mysqli_query($conn, $SQL);
    if (mysqli_num_rows($result) > 0) 
    {
      $row = mysqli_fetch_assoc($result);
    }    
    ?>
    <form name="staff" class="container-fluid needs-validation" action="../staff/staff_update.php?A=1&P=0" method="POST" novalidate>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="First_Name">Name</label>
          <input type="First_Name"  name="First_Name" class="form-control" placeholder="Name" required value="<?php echo $row['First_Name']; ?>">
        </div>
        <div class="form-group col-md-6">
          <label for="Surname">Surname</label>
          <input type="Surname" name="Surname" class="form-control" placeholder="Surname" required value="<?php echo $row['Surname']; ?>">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="Position">Position</label>
          <input type="Position" name="Position" class="form-control" placeholder="Position" required value="<?php echo $row['Position']; ?>">
        </div>
        <div class="form-group col-md-6">
          <label for="Department">Department</label>
          <input type="Department" name="Department" class="form-control" placeholder="Department" required value="<?php echo $row['Department']; ?>">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="Office_Number">Office Number</label>
          <input type="Office_Number" name="Office_Number" class="form-control" placeholder="Office Number" required value="<?php echo $row['Office_Number']; ?>">
        </div>
        <div class="form-group col-md-6">
          <label for="Branch_Number">Branch Name</label>
          <select name="Branch_Number" name="Branch_Number" class="form-control">
          <?php
            $branch_number = $row['Branch_Number'];
            $sql1 = "SELECT branch_number, branch_name FROM branches ORDER BY branch_name";
            $result1 = mysqli_query($conn, $sql1) or die("Error reading branches - ".mysqli_error($conn));
            while ($row1 = mysqli_fetch_array($result1))
            {
                if ($branch_number == $row1[branch_number]) 
                  echo "<option value=\"$row1[branch_number]\" selected>$row1[branch_name]</option>"; 
                else 
                  echo "<option value=\"$row1[branch_number]\">$row1[branch_name]</option>";
            }
          ?>
          </select>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="Gender">Gender</label>
          <select name="Gender" name="Gender" class="form-control" placeholder="Gender" type="Gender" >
                <option value="M" <?php if($row['Gender'] == "M"){echo "selected";} ?>>Male</option>
                <option value="F" <?php if($row['Gender'] == "F"){echo "selected";} ?>>Female</option>
                <option value="O" <?php if($row['Gender'] == "O"){echo "selected";} ?>>Other</option>
	            </select>
        </div>
        <div class="form-group col-md-6">
          <label for="Date_of_Birth">Date of Birth</label>
          <input type="date" class="form-control" name="Date_of_Birth" id="Date_of_Birth" placeholder="DD/MM/YYYY" required value="<?php echo $row['Date_of_Birth']; ?>">
        </div>
      </div>
      <input name="staffnumber" type="hidden" value="<?php echo $staffnumber;?>">
      <button type="submit" class="btn btn-success btn-sm">Update</button>
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
      </form>

      <form name="staff" class="container-fluid needs-validationP" action="../staff/staff_update.php?A=0&P=1" method="POST" novalidate>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="Email" id="Email" aria-describedby="emailHelp" placeholder="Enter email" required value="<?php echo $row['Email']; ?>">
        </div>
        <div class="form-group col-md-6">
          <label for="Password">Password</label>
          <input type="password" class="form-control" name="Password" id="Password" placeholder="Password" maxlength="6" required >
        </div>
      </div>      
      <button type="submit" class="btn btn-success btn-sm">Update Password</button>
      <a href="../staff/staff_list.php" class="btn btn-secondary btn-sm" role="button" >Staff List</a>
      <div>
      <input name="staffnumberP" type="hidden" value="<?php echo $staffnumber;?>">
      <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validationP');
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
      </form>
      <div>
      <br><br>
</div>
<?php
	include('../main/footer.php');
?>
</body>
</html>