<?php
/**
 * Author: Edgar Hernandez
 * Date: 01/05/2019
 * Purpose: Page to allow a staff member to create new books and edit existing ones.
 */

require "dbConnectBooks.php";

$BookID = $_GET['bookid'];
$SQL = "SELECT * FROM Books WHERE BookID = " . $BookID;
$result = mysqli_query($conn, $SQL);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>Edgar Hernandez's Library</title>
   <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <h1>Edit Book</h1>
    <p>Search for books by Book Type</p>
	<form action="update-book.php" method="post">
		<div>
		  <table width="599" border="0" cellpadding="4" cellspacing="4">
            <tr>
              <td width="74">ISBN:</td>
              <td width="162"><input name="ISBN" type="text" value="<?php echo $row['ISBN']; ?>"></td>
              <td width="71">Author:</td>
              <td width="240"><input name="Author" type="text" value="<?php echo $row['Author']; ?>"></td>
            </tr>
            <tr>
              <td>Title:</td>
              <td colspan="3"><input name="Title" type="text" value="<?php echo $row['Title']; ?>"></td>
            </tr>
            <tr>
              <td>Book Type: </td>
              <td><select name="book_type">
                <option value="S" <?php if($row['Booktype'] == "S"){echo "selected";} ?>>Soft cover</option>
                <option value="H" <?php if($row['Booktype'] == "H"){echo "selected";} ?>>Hard cover</option>
                <option value="D" <?php if($row['Booktype'] == "D"){echo "selected";} ?>>Digital</option>
	            </select></td>
              <td>Price($):</td>
              <td><input name="Price" value="<?php echo $row['Price']; ?>"></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><a href="staff-list.php">Book List</a></td>
              <td colspan="2" align="center">
	          <input name="BookID" type="hidden" value="<?php echo $BookID;?>">
			  <input type="submit" value="Edit Book">
			  </td>
            </tr>
          </table>
		</div>
      </p>
    </form>
</body>
</html>