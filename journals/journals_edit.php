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
            <?php
                if (empty($_GET['journal_id']))
                    die("You need to select a publication from the list");
                $journal_number = $_GET['journal_id'];
                //open the server connection
                require '../main/dbConnectionCHR.php'; 
                //get the record
                $sql = "SELECT j.*,
                    (SELECT CONCAT(s.First_Name, ' ', s.Surname) 
                        FROM staff s
                        WHERE s.Staff_Number = j.Staff_Number)
                        AS Journal_Author
                    FROM journals j WHERE Journal_Number = $journal_number";

                $result = mysqli_query($conn, $sql) or die("Error editing - ". mysqli_error($conn)); 
                if (mysqli_affected_rows($conn) == 0)
                    die("Error – record not found to edit");

                while ($row = mysqli_fetch_array($result))
                {
                    $journal_name = $row['Journal_Name'];
                    $journal_type = $row['Journal_Type'];
                    $publication_date = $row['Publication_Date'];
                    $d = strtotime($publication_date);
                    $staff_number = $row['Staff_Number'];
                    $journal_text = $row['Journal_Text'];
                    $journal_author = $row['Journal_Author'];
                }

                echo "<div class='jumbotron small'>";
                echo "<div class='journal-headline' >";
                echo "  <h1 style=\"font-family: 'nyt-cheltenham', 'georgia', 'times new roman', 'times', 'serif';\">";
                echo "      <span>$journal_name</span>";
                echo "  </h1>";
                echo "</div>";
                
                echo "<div class='journal-details'>";
                echo "  <p style=\"font-family: 'nyt-imperial', 'helvetica', 'arial', 'sans-serif';\"><b>By $journal_author</b> | 
                        <span>".date('F j, Y', $d)."</span></p>";
                echo "</div>";
                echo "</div>";
                
                echo "<div class='journal-body'>";
                echo "  <p class='text-justify' style=\"font-family: 'nyt-imperial', 'georgia', 'times new roman', 'times', 'serif';\">$journal_text</p>";
                echo "</div>";

                echo "<button type='button' class='btn btn-secondary' aria-label='1162 comments. Click to read and post comments.' id='comments-speech-bubble-bottom'>Read 1162 Comments</button>";


                // echo "<div class='jumbotron small'>";
                // echo "    <h1>$journal_name</h1>";
                // echo "    <p>$journal_author | ".date('l jS \of F Y', $d)."</p> ";
                // echo "</div>";
                
                // echo "<form action=\"journals_update.php\" method=\"POST\">";
                // echo "<input hidden name=\"number\" id=\"number\" value=\"$journal_number\">";
                // echo "  <div class=\"row\">";
                // echo "      <div class=\"form-group col\">";
                // echo "          <label for=\"name\">Name:</label>";
                // echo "          <input name=\"name\" type=\"text\" class=\"form-control\" id=\"name\" required value=\"$journal_name\">";
                // echo "      </div>";
                // echo "      <div class=\"form-group col\">";
                // echo "          <label for=\"type\">Type:</label>";

                // require "../main/dbConnectionCHR.php";
                // $sql = "SELECT * FROM journal_types ORDER BY Journal_Type_Desc";
                // $result = mysqli_query($conn, $sql) or die("Error reading journal types - ".mysqli_error($conn));

                // echo "<select required class=\"form-control custom-select\" id=\"type\" name=\"type\">";
                // while ($row = mysqli_fetch_array($result))
                // {
                //     if ($journal_type == $row['Journal_Type_Code'])
                //         echo "<option selected value=\"$row[Journal_Type_Code]\">$row[Journal_Type_Desc]</option>";
                //     else 
                //         echo "<option value=\"$row[Journal_Type_Code]\">$row[Journal_Type_Desc]</option>";
                // }
                // echo "</select>";

                // echo "    </div>";
                // echo "</div>";
                // echo "<div class=\"row\">";
                // echo "    <div class=\"form-group col\">";
                // echo "        <label for=\"text\">Text:</label>";
                // echo "        <textarea name=\"text\" class=\"form-control\" rows=\"5\" id=\"text\" required>$journal_text</textarea>";
                // echo "    </div>";
                // echo "</div>";
                // echo "<button type=\"submit\" class=\"btn btn-primary\">Submit</button>";
            ?>
            <a href="journals_list.php" class="btn btn-secondary" role="button">Publicantion List</a>
        </div>	

    <?php
        // include('../main/footer.php');
        // //close db connection
        // mysqli_close($conn);
    ?>
</body>
</html>