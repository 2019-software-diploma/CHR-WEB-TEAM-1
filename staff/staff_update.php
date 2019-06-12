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
<?php
	include('../main/head.php');
?>
<body>
<?php
	include('../main/menu.php');
?>
<div class="container-fluid" >

<h4 align="center">Staff Member</h4>

<?php
    if (!empty($_POST['staffnumber']) || !empty($_POST['staffnumberP']))
    { 
        //update the record
        if($_GET['A']=='1')
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
    
            $sql = "UPDATE staff 
            SET First_Name = '$First_Name', 
                Surname = '$Surname', 
                Position = '$Position',
                Gender = '$Gender',
                Date_of_Birth = '$Date_of_Birth',
                Department = '$Department',
                Office_Number = '$Office_Number',
                Branch_Number = $Branch_Number
            WHERE Staff_Number = $Staff_Number";
        }

        if($_GET['P']=='1')
        {
            $staffnumberP = trim($_POST['staffnumberP']);
            $Email = trim($_POST['Email']);
            $Password = trim($_POST['Password']);

            $sql = "UPDATE staff 
            SET email = '$Email', 
                password = SHA('$Password')
            WHERE Staff_Number = $staffnumberP";
        }

        $result = mysqli_query($conn, $sql) or die("Error updating record ".mysqli_error($conn));

        $numrows = mysqli_affected_rows($conn);
        
        echo "Staff member updated successfully!<br><br>";
        echo "<a href='staff_new.php' class='btn btn-primary btn-sm'>New Staff Member</a>";            
        echo "&nbsp;&nbsp;&nbsp";
        echo "<a href='../staff/staff_list.php' class='btn btn-secondary btn-sm' role='button' >Staff List</a>";
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