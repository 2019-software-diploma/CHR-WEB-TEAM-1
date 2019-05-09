<?php
/**
 * Author: Edgar Hernandez
 * Date: 01/05/2019
 * Purpose: Page to allow a staff member to create new books and edit existing ones.
 */
 
require "dbConnectBooks.php";

$SQL = "DELETE FROM Books WHERE BookID = " . $_GET['bookid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edgar Hernandez's Library</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <h1>Book Deleted</h1>
    <?php
    if (mysqli_query($conn, $SQL))
	{
        echo "<p>1 Book deleted</p>";
    } 
	else 
	{
        echo "<p>Error: " . mysqli_error($conn);
    }
    ?>
    <br><br>
    <a href="staff-list.php">Book List</a>
	<br>
    <a href="new-staff.php">New Book</a>
</body>
</html>
