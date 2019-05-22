<?php
/**
 * Author: Edgar Hernandez
 * Date: 01/05/2019
 * Purpose: Page to update a staff member
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
	<link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="../js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="../js/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="../js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	
</head>
<body>
<?php
	include('../main/menu.php');
?>
<div class="container-fluid" >

<h4 align="center">Staff Member</h4>

<?php
    if (!empty($_POST['staffnumber']))
    { 
        $Staff_Number = trim($_POST['staffnumber']);
        $First_Name = trim($_POST['First_Name']);
        $Surname = trim($_POST['Surname']);
        $Position = trim($_POST['Position']);
        $Department = trim($_POST['Department']);
        $Office_Number = trim($_POST['Office_Number']);
        $Branch_Number = trim($_POST['Branch_Number']);
        $Gender = trim($_POST['Gender']);
        $Date_of_Birth = trim($_POST['Date_of_Birth']);
        $Email = trim($_POST['Email']);
        $Password = trim($_POST['Password']);

       //update the record
        $sql = "UPDATE staff 
            SET First_Name = '$First_Name', 
                Surname = '$Surname', 
                Position = '$Position',
                Gender = '$Gender',
                Date_of_Birth = '$Date_of_Birth',
                Department = '$Department',
                Office_Number = '$Office_Number',
                Branch_Number = $Branch_Number,
                Email = '$Email',
                Password = '$Password'
            WHERE Staff_Number = $Staff_Number";

        $result = mysqli_query($conn, $sql) or die("Error updating record ".mysqli_error($conn));

        $numrows = mysqli_affected_rows($conn);

        if ($numrows == 1)
        {
            echo "Staff member updated successfully!<br><br>";
            echo "<a href='staff_new.php' class='btn btn-primary btn-sm'>New Staff Member</a>";            
            echo "&nbsp;&nbsp;&nbsp";
            echo "<a href='../staff/staff_list.php' class='btn btn-secondary btn-sm' role='button' >Staff List</a>";
        }
        else
        {
            echo "Staff member add failed. $numrows were updated"; 
            echo "&nbsp;&nbsp;&nbsp";
            echo "<a href='../staff/staff_list.php' class='btn btn-secondary btn-sm' role='button' >Staff List</a>";
        }

    }
    else
    {
        echo "You must supply all the Staff Number!<br><br>";
        echo "<a href='#' onclick='window.history.go(-1); return false;' class='btn btn-secondary btn-sm' role='button' >Go Back</a>";
        echo "&nbsp;&nbsp;&nbsp";
        echo "<a href='../staff/staff_list.php' class='btn btn-secondary btn-sm' role='button' >Staff List</a>";
    }

?>

<br><br>


</div>
<?php
	include('../main/footer.php');
?>
</body>
</html>