<!-- *********************************************************************** -->
<!-- Programmer: Marco S. Chalub -->
<!-- Date: 02 May 2018 -->
<!-- Software: Microsoft Visual Studio Code -->
<!-- Platform: macOS Mojave 10.14.4 -->
<!-- Purpose: Assessment 3 -->
<!-- *********************************************************************** -->
<html>
<head>
    <title>Marco's Library</title>
</head>

<body>
    <h1>Delete Book</h1>
    <?php
        if (empty($_GET['book_id']))
            die("You must select a book to delete");
        $book_id = $_GET['book_id'];
        //open the server connection
        require 'dbConnectBooks.php'; 
        //delete the customer
        $sql = "DELETE FROM Books WHERE BookID = $book_id";
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
    </body>
</html>