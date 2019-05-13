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
    <style>
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

    </style>
<head>
<body>    
    <h1>Marco's Library</h1>
    <?php
        //read form field and die it it's empty
        if (empty($_GET['book_type']))
            die("You must select a Book Type!");

        $book_type = $_GET['book_type'];

        //open db connection
        require 'dbConnectBooks.php';

        //select book type description
        $sql_btd = "SELECT bt.Description FROM BookTypes bt
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
</body>
</html>