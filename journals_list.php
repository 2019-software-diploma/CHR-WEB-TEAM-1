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
?>

<div class="container">
    <?php
        //read session field and die it it's empty
        if (empty($_SESSION['userName']))
            die("You must log in!");

        //open db connection
        require 'dbConnectionCHR.php';

        //select book type description
        $sql_btd = "SELECT bt.Description FROM journals jn
        WHERE bt.Book_type = '".$book_type."'";

        $result = mysqli_query($conn, $sql_btd) or die("Error reading book types ".mysqli_error($conn));

        //build book type html
        if ($book_type_desc = mysqli_fetch_array($result))
            echo "Search Criteria: Book Type: $book_type_desc[Description]<br><br>";
        
        //back to search page
        echo "<a href=marco.php>Search again</a><br><br>";

        //select books
        $sql = "SELECT b.BookID,
                    b.ISBN,
                    b.Title,
                    b.Author,
                    (SELECT bt.Description FROM BookTypes bt
                        WHERE bt.Book_type = b.Booktype) AS Booktype,
                    b.Price
                    FROM Books b";

        //append where clause in case of book type is not All
        if ($book_type != 'A')
            $sql = $sql." WHERE Booktype = '".$book_type."' ORDER BY BookID";
        
        $result = mysqli_query($conn, $sql) or die("Error reading books ".mysqli_error($conn));

        //build result html
        echo "<table>";
        echo "<tr><th>Book ID</th>
                    <th>ISBN</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Book Type</th>
                    <th>Price</th>
                    <th>Action</th></tr>";

        //dynamic book list
        while ($row = mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>$row[BookID]</td>";
            echo "<td>$row[ISBN]</td>";
            echo "<td>$row[Title]</td>";
            echo "<td>$row[Author]</td>";
            echo "<td>$row[Booktype]</td>";
            if($row[5] != 0.0)
                echo "<td>AU$$row[Price]</td>";
            else
                echo "<td>-</td>";
            echo "<td ><a href=editbook.php?book_id=$row[BookID]>Edit</a> " .
            "<a href=deletebook.php?book_id=$row[BookID]>Delete</a></td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "<br><br><a href=newbook.html>New book</a>";

        //close db connection
        mysqli_close($conn);
    ?>
    </div>	

<?php
	include('../footer.php');
?>
</body>
</html>