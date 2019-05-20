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
	<link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="../js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="../js/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="../js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	
    <style>
        button {
            margin-bottom: 50px;
        }
    </style>
</head>
    <body>
        <?php
            include('../main/menu.php');
        ?>
        <div class="container">
            <?php
                if (empty($_GET['journal_id']))
                    die("You need to select a publication from the list");
                $journal_id = $_GET['journal_id'];
                //open the server connection
                require 'dbConnectionCHR.php'; 
                //get the record
                $sql = "SELECT * FROM journals WHERE Journal_Number = $journal_id";
                //echo "$sql";
                $result = mysqli_query($conn, $sql) or die("Error editing - ". mysqli_error($conn)); 
                if (mysqli_affected_rows($conn) == 0)
                    die("Error – record not found to edit");

                while ($row = mysqli_fetch_array($result))
                {
                    $journal_name = $row['Journal_Number'];
                    $journal_type = $row['Journal_Type'];
                    $publication_date = $row['Publication_Date'];
                    $staff_number = $row['Staff_Number'];
                }

                echo "<form action=\"journals_update.php\" method=\"POST\">";
                echo "    <input type=\"hidden\" name=\"journal_id\" value=\"$journal_id\">";
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
        </div>	

    <?php
        include('../main/footer.php');
        //close db connection
        mysqli_close($conn);
    ?>
</body>
</html>