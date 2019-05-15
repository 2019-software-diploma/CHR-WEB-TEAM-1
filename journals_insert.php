<!-- *********************************************************************** -->
<!-- Programmer: Marco S. Chalub -->
<!-- Software: Microsoft Visual Studio Code -->
<!-- Platform: macOS Mojave 10.14.4 -->
<!-- Purpose: Software Project -->
<!-- *********************************************************************** -->
<html>
    <head>
        <title>Marco's Library</title>
    </head>
    <body>
        <h1>Insert Book</h1>
        <?php 
            if (!empty($_GET['isbn'])
                && !empty($_GET['author'])
                && !empty($_GET['title'])
                && !empty($_GET['book_type'])
                && !empty($_GET['price']))
            { 
                $isbn = trim($_GET['isbn']);
                $author = trim($_GET['author']);
                $title = trim($_GET['title']);
                $book_type = $_GET['book_type'];
                $price = trim($_GET['price']);
                
                //open the server connection
                require 'dbConnectBooks.php'; 
                //update the record
                $sql = "INSERT INTO Books VALUES('', '$isbn', '$title', '$author', '$book_type', '$price')";
                $result = mysqli_query($conn, $sql) or die("Error inserting record ".mysqli_error($conn));
                $numrows = mysqli_affected_rows($conn);
                if ($numrows == 1)
                    echo "Book added successfully";
                else
                    echo "Book add failed. $numrows were inserted"; 
            }
            else
            {
                die("You must supply all the book information");
            }
        ?>
        <br><br>
        <a href="booklist.php?book_type=A">Book List</a>
        <br><a href="newbook.html">New book</a>
    </body>
</html>