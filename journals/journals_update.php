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
        <h1>Update Book</h1>
        <?php
            if (!empty($_POST['book_id'])
                && !empty($_POST['isbn'])
                && !empty($_POST['author'])
                && !empty($_POST['title'])
                && !empty($_POST['book_type'])
                && !empty($_POST['price']))
            {
                $book_id = $_POST['book_id'];
                $isbn   = trim($_POST['isbn']);
                $title  = trim($_POST['title']);
                $author     = trim($_POST['author']);
                $book_type   = trim($_POST['book_type']);
                $price       = trim($_POST['price']);

                if (!$book_id || !$isbn || !$title ||
                !$author || !$book_type || !$price)
                    die("Some book information has not been supplied");
                
                //open the server connection
                require 'dbConnectBooks.php'; 
                //update the record
                $sql = "UPDATE Books SET ISBN='$isbn', Title='$title', Author='$author', Booktype='$book_type', price=$price WHERE BookID=$book_id";
                $result = mysqli_query($conn, $sql) or die("Error updating record ".mysqli_error($conn));
                $numrows = mysqli_affected_rows($conn);
                if ($numrows == 1)
                    echo "Update successful";
                else
                    echo "Update failed. $numrows were updated"; 
            }
            else
            {
                die("You must use the edit screen to supply values for the order");
            }
           
        ?>
        <br><br>
        <a href="booklist.php?book_type=A">Book List</a>
        <br><a href="newbook.html">New book</a>
    </body>
</html>