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
	<h4 align="center">New Staff Member</h4>
    <form action="../web/staff/insert-book.php" method="post">
		<div>
		  <table width="80%" border="0" align="center" cellpadding="4" cellspacing="4">
            <tr>
              <td width="20%">Name:</td>
              <td width="162"><input name="Name" type="text" ></td>
              <td width="20%">Surname:</td>
              <td width="240"><input name="Surnam" type="text" ></td>
            </tr>
            
            <tr>
              <td width="20%">Position:</td>
              <td><input name="Position" type="text" ></td>
              <td width="20%">Gender:</td>
              <td><select name="Gender">
                <option value="M">Male</option>
                <option value="F">Female</option>
                <option value="O">Not Specified</option>
              </select></td>
            </tr>
            <tr>
              <td width="20%">Date of Birth: </td>
              <td><select name="Date_of_Birth" >
                <option value="S">Soft cover</option>
                <option value="H">Hard cover</option>
                <option value="D">Digital</option>
              </select></td>
              <td width="20%">Department:</td>
              <td><input name="Price" ></td>
            </tr>
            <tr>
              <td width="20%">Office Number: </td>
              <td><input name="Office_Number" ></td>
              <td width="20%"><a href="#" onClick="PopupCenter('branch-list.php','branch','300','200');">Branch:</a></td>
              <td><select name="Branch_Number">
                <option value="M">Male</option>
                <option value="F">Female</option>
                <option value="O">Not Specified</option>
              </select></td>
            </tr>
            <tr>
              <td colspan="4" align="center">Login Info  </td>
            </tr>
            <tr>
              <td>email:</td>
              <td><input name="eMail" ></td>
              <td align="left">Password:</td>
              <td align="left"><input name="Password" ></td>
            </tr>
            <tr>
              <td colspan="2"><a href="staff-list.php">Staff List</a></td>
              <td colspan="2" align="center"><input type="submit" value="Insert Staff"></td>
            </tr>
          </table>
		</div>
      </p>
    </form>
<?php
	include('../main/footer.php');
?>
</body>
</html>