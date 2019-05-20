<!-- *********************************************************************** -->
<!-- Programmer: Marco S. Chalub -->
<!-- Software: Microsoft Visual Studio Code -->
<!-- Platform: macOS Mojave 10.14.4 -->
<!-- Purpose: Software Project -->
<!-- *********************************************************************** -->
<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Caprivi Healthcare Research</title>
	<link rel="stylesheet" href="../../css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="../../js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="../../js/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="../../js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	
</head>
<body>
<?php
    include('../menu.php');
    echo $_SESSION['userName'];
?>
    <h1>Delete Journal</h1>
    <?php
        if (empty($_GET['journal_id']))
            die("You must select a journal to delete");
        $journal_id = $_GET['journal_id'];
        //open the server connection
        require '../database/dbConnectionCHR.php'; 
        //delete the customer
        $sql = "DELETE FROM journals WHERE jaournal_id = $journal_id";
        $result = mysqli_query($conn, $sql) or die("Error deleting record - ".mysqli_error($conn));
        $numrows = mysqli_affected_rows($conn);
        if ($numrows == 1)
            echo "<h2>Delete successful</h2>";
        else
            echo "<h2>Delete failed. $numrows were deleted</h2>";
        mysqli_close($conn);
    ?>
    <br><br>
    <a href="booklist.php?book_type=A">Book List</a>
    <br><a href="newbook.html">New book</a>
    <?php
	    include('../footer.php');
    ?>
</body>
</html>