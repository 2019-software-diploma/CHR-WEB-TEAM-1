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
        td * {
            width: 100%;
        }
    </style>
    </head>
    <body>
        <h1>Edit Book</h1>
        <?php
            if (empty($_GET['book_id']))
                die("You need to select a book from the list");
            $book_id = $_GET['book_id'];
            //open the server connection
            require 'dbConnectBooks.php'; 
            //get the record
            $sql = "SELECT * FROM Books WHERE BookID = $book_id";
            //echo "$sql";
            $result = mysqli_query($conn, $sql) or die("Error editing - ". mysqli_error($conn)); 
            if (mysqli_affected_rows($conn) == 0)
                die("Error – record not found to edit");

            while ($row = mysqli_fetch_array($result))
            {
                $isbn = $row['ISBN'];
                $title = $row['Title'];
                $author = $row['Author'];
                $bookType = $row['Booktype'];
                $price = $row['Price'];
            }

            echo $price;

            echo "<form action=\"updatebook.php\" method=\"POST\">";
            echo "    <input type=\"hidden\" name=\"book_id\" value=\"$book_id\">";
            echo "    <table border=\"0\">";
            echo "        <tr>";
            echo "            <td><label for=\"isbn\"> ISBN: </label></td>";
            echo "            <td><input type=\"text\" id=\"isbn\" name=\"isbn\" maxlength=\"14\" minlength=\"10\" value=\"$isbn\"></td>";
            echo "            <td><label for=\"author\"> Author: </label></td>";
            echo "            <td><input type=\"text\" id=\"author\" name=\"author\" value=\"$author\"></td>";
            echo "        </tr>";
            echo "        <tr>";
            echo "            <td><label for=\"title\"> Title: </label></td>";
            echo "            <td colspan=\"3\"><input type=\"text\" id=\"title\" name=\"title\" value=\"$title\"></td>";
            echo "        </tr>";
            echo "        <tr>";
            echo "            <td><label for=\"book_type\"> Book Type: </label></td>";
            echo "            <td>";
            echo "                <select required id=\"book_type\" name=\"book_type\">";

            $sql = "SELECT * FROM BookTypes ORDER BY Book_type";
            $result = mysqli_query($conn, $sql) or die("Error reading clothes - ".mysqli_error($conn));
            
            while ($row = mysqli_fetch_array($result))
            {
                if ($bookType == $row[Book_type]) 
                    echo "<option value=\"$row[Book_type]\" selected>$row[Description]</option>"; 
                else 
                    echo "<option value=\"$row[Book_type]\">$row[Description]</option>";
            }

            echo "                </select>";
            echo "            </td>";
            echo "            <td><label for=\"price\"> Price(AU$): </label></td>";
            echo "            <td><input type=\"number\" id=\"price\" name=\"price\" step=\"0.01\" value=\"$price\"></td>";
            echo "        </tr>";
            echo "        <tr>";
            echo "            <td></td>";
            echo "            <td></td>";
            echo "            <td></td>";
            echo "            <td><input type=\"submit\" value=\"Update Book\"></td>";
            echo "        </tr>";
            echo "    </table>";
            echo "</form>";
        ?>
        <a href="booklist.php?book_type=A">Book List</a>
    </body>
</html>