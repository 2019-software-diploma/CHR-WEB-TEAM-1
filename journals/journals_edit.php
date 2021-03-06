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
<?php
	include('../main/head.php');
?>
    <body>
        <?php
            include('../main/menu.php');
        ?>
        <div class="container">
            <div class="jumbotron small">
                <h1>Publication</h1>
                <p>Edit your chosen publication!</p> 
            </div>
            <?php
                if (empty($_GET['journal_id']))
                    die("You need to select a publication from the list");
                $journal_number = $_GET['journal_id'];
                //open the server connection
                require '../main/dbConnectionCHR.php'; 
                //get the record
                $sql = "SELECT * FROM journals WHERE Journal_Number = $journal_number";
                //echo "$sql";
                $result = mysqli_query($conn, $sql) or die("Error editing - ". mysqli_error($conn)); 
                if (mysqli_affected_rows($conn) == 0)
                    die("Error – record not found to edit");

                while ($row = mysqli_fetch_array($result))
                {
                    $journal_name = $row['Journal_Name'];
                    $journal_type = $row['Journal_Type'];
                    $publication_date = $row['Publication_Date'];
                    $staff_number = $row['Staff_Number'];
                    $journal_text = $row['Journal_Text'];
                }

                echo "<form action=\"journals_update.php\" method=\"POST\">";
                echo "<input hidden name=\"number\" id=\"number\" value=\"$journal_number\">";
                echo "  <div class=\"row\">";
                echo "      <div class=\"form-group col\">";
                echo "          <label for=\"author\">Author:</label>";
                echo "          <input disabled name='author' type='text' class='form-control' id='author' value='".$_SESSION['userName']."'>";
                echo "      </div>";
                echo "      <div class=\"form-group col\">";
                echo "          <label for=\"date\">Date:</label>";

                $d = strtotime($publication_date);

                echo "          <input disabled name='date' type='text' class='form-control' id='date' value='" . date("d/m/Y", $d) . "'>";
                echo "      </div>";
                echo "  </div>";
                echo "  <div class=\"row\">";
                echo "      <div class=\"form-group col\">";
                echo "          <label for=\"name\">Name:</label>";
                echo "          <input name=\"name\" type=\"text\" class=\"form-control\" id=\"name\" required value=\"$journal_name\">";
                echo "      </div>";
                echo "      <div class=\"form-group col\">";
                echo "          <label for=\"type\">Type:</label>";

                require "../main/dbConnectionCHR.php";
                $sql = "SELECT * FROM journal_types ORDER BY Journal_Type_Desc";
                $result = mysqli_query($conn, $sql) or die("Error reading journal types - ".mysqli_error($conn));

                echo "<select required class=\"form-control custom-select\" id=\"type\" name=\"type\">";
                while ($row = mysqli_fetch_array($result))
                {
                    if ($journal_type == $row['Journal_Type_Code'])
                        echo "<option selected value=\"$row[Journal_Type_Code]\">$row[Journal_Type_Desc]</option>";
                    else 
                        echo "<option value=\"$row[Journal_Type_Code]\">$row[Journal_Type_Desc]</option>";
                }
                echo "</select>";

                echo "    </div>";
                echo "</div>";
                echo "<div class=\"row\">";
                echo "    <div class=\"form-group col\">";
                echo "        <label for=\"text\">Text:</label>";
                echo "        <textarea name=\"text\" class=\"form-control\" rows=\"5\" id=\"text\" required>$journal_text</textarea>";
                echo "    </div>";
                echo "</div>";
                echo "<button type=\"submit\" class=\"btn btn-success\">Submit</button>";
            ?>
            <a href="journals_list.php" class="btn btn-secondary btn-sm" role="button">Publicantion List</a>
        </div>	

    <?php
        include('../main/footer.php');
        //close db connection
        mysqli_close($conn);
    ?>
</body>
</html>