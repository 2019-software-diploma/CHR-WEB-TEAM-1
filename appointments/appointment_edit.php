<?php
 	session_start();
	

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
<script>
  $( function() {
  $( "#Appointment_Date" ).datepicker();
  } );
</script>
<body>
<?php
	include('../main/menu.php');
?>

<div class="container-fluid" >

    <h4 align="center">Edit Appointment</h4>
	<?php
    if (empty($_GET['appointmentid']))
    { 
        echo "You must select an appointment to be edited!<br><br>";
        echo "<a href='#' onclick='window.history.go(-1); return false;' class='btn btn-secondary btn-sm' role='button' >Go Back</a>";
        echo "&nbsp;&nbsp;&nbsp";
        echo "<a href='../staff/staff_list.php' class='btn btn-secondary btn-sm' role='button' >Staff List</a>";
        die();
    }
	
	
    require "../main/dbConnectionCHR.php";
  
    $appointmentid = $_GET['appointmentid'];
    $SQL = "SELECT * FROM appointments WHERE Appointment_ID = " . $appointmentid;
    $result = mysqli_query($conn, $SQL);
    if (mysqli_num_rows($result) > 0) 
    {
      $row = mysqli_fetch_assoc($result);
    }    
    ?>
	
    <form name="staff" class="container-fluid needs-validation" action="../appointments/appointment_update.php" method="POST" novalidate>
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
          <label for="Phone_Number">Phone Number</label>
          <input type="Phone_Number" name="Phone_Number" class="form-control" placeholder="Phone_Number" required value="<?php echo $row['Phone_Number']; ?>">
        </div>
        <div class="form-group col-md-6">
          <label for="Staff_Number">Staff Member</label>
          <input type="Staff_Number" name="Staff_Number" class="form-control" placeholder="Staff_Number" required value="<?php echo $row['Staff_Number']; ?>">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="Appointment_Time">Appointment Time</label>
          <input type="Appointment_Time" name="Appointment_Time" class="form-control" placeholder="Appointment_Time" required value="<?php echo $row['Appointment_Time']; ?>">
        </div>
        <div class="form-group col-md-6">
          <label for="Appointment_Date">Appointment Date</label>
          <input type="Appointment_Date" name="Appointment_Date" id="Appointment_Date" class="form-control" placeholder="Appointment_Date" required value="<?php echo $row['Appointment_Date']; ?>">
        </div>
      </div>	  
	  
      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="Summary">Summary</label>
          <input type="Summary" name="Summary" class="form-control" placeholder="Summary" required value="<?php echo $row['Summary']; ?>">
        </div>
      </div>
	  
	  <input name="appointmentid" type="hidden" value="<?php echo $appointmentid;?>">
      <button type="submit" class="btn btn-success btn-sm">Submit</button>
	  
	  
	  <a href="../appointments/appointment_list.php" class="btn btn-secondary btn-sm" role="button" >Appointment List</a>
	  
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