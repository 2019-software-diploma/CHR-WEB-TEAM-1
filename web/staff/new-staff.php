<?php
/**
 * Author: Edgar Hernandez
 * Date: 01/05/2019
 * Purpose: Page to allow a staff member to create new staff and edit existing ones.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Caprivi Healthcare Research</title>
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/general.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
	<h3 align="center">New Staff Member</h3>
    <form action="insert-book.php" method="post">
		<div>
		  <table width="650" border="0" align="center" cellpadding="4" cellspacing="4">
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
              <td colspan="2"><a href="staff-list.php">Staff List</a></td>
              <td colspan="2" align="center"><input type="submit" value="Insert Staff"></td>
            </tr>
          </table>
		</div>
      </p>
    </form>
</body>
</html>