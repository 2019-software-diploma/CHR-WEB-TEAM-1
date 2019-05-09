<?php
/**
 * Author: Edgar Hernandez
 * Date: 01/05/2019
 * Purpose: Page to allow a staff member to create new books and edit existing ones.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edgar Hernandez's Library</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <h1>Insert Book</h1>
    <?php
	require "dbConnectBooks.php";
	
    $ISBN = $_POST['ISBN'];
    $Title = $_POST['Title'];
    $Author = $_POST['Author'];
    $BookType = $_POST['book_type'];
    $Price = $_POST['Price'];
	
	if(empty($ISBN) && empty($Author) && empty($Title) && empty($Price)) 
	{
       echo "<p>Some information has not been supplied: ISBN, Author, Title and Price!</p>";
	}
	else if (!is_numeric($Price)) 
	{
        echo "<p>Price must numeric value!</p>";
	}
	else
	{
		$SQL = "INSERT INTO Books (ISBN, Title, Author, Booktype, Price) VALUES ('$ISBN','$Title','$Author','$BookType','$Price')";
	
		if (mysqli_query($conn, $SQL)){
			echo "<p>1 Book inserted</p>";
		} else {
			echo "<p>Error: " . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
	?>
	<br><br>
    <a href="staff-list.php">Book List</a>
	<br>
    <a href="new-staff.php">New Book</a>
</body>
</html>
