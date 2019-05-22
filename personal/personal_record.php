<html>
	 <head>
		<title>View my personal record</title>
	 </head>
 <body>
	<h1>View my personal record</h1>
 <?php
 session_name('myapp');         
   session_start();        
   if (empty($_SESSION['firstname']))
   {
      echo "I am sorry but this page is only available to members who have logged in";
      echo " and who have cookies enabled to verify that.";
   }
   else
   {
      $firstname = $_SESSION['firstname'];
       require 'ConnectDB.php'; 
		//read through the addresses and write out info
		$sql = "SELECT * FROM staff WHERE First_Name='$firstname'";
		$result = mysqli_query($conn, $sql) or die("Error reading orders - ".mysqli_error($conn));
		if (mysqli_affected_rows($conn) == 0)
				die("Error – record not found to edit");
		while ($row = mysqli_fetch_array($result))
		{
			$staffno = $row['Staff_Number'];
			$firstname = $row['First_Name'];
			$surname = $row['Surname'];
			$position = $row['Position'];
			$gender = $row['Gender'];
			$birth = $row['Date_of_Birth'];
			$department = $row['Department'];
			$officeno = $row['Office_Number'];
			$branchno = $row['Branch_Number'];
			$email = $row['Email'];
			$userlevel = $row['User_level'];
		}
		 echo "<h2>This is Your's Personal Record!</h2>";
		 echo "<a href=memberpage.php>Back member page</a><br><br>";
		 
		echo "<table border = 1>
		<tr><td>Staff Number</td><td> $staffno </td></tr>
		<tr><td>Name</td><td> $firstname";
		echo "$surname </td></tr>
		<tr><td>User Level</td><td> $userlevel </td></tr>
		<tr><td>Position</td><td> $position </td></tr>
		<tr><td>Gender</td><td> $gender </td></tr>
		<tr><td>Birth</td><td> $birth </td></tr>
		<tr><td>Department</td><td> $department </td></tr>
		<tr><td>Office Number</td><td> $officeno </td></tr>
		<tr><td>Branch Number</td><td> $branchno </td></tr>
		<tr><td>E-mail</td><td> $email </td></tr>
		</table>
		<br>";
   }
  ?>
  

	<a href="logoff.php">LogOff</a>
	
 </body>
</html>