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
            <p>Add your new publication!</p> 
        </div>

        <form action="journals_insert.php" method="GET">
            <div class="row">
                <div class="form-group col">
                    <label for="author">Author:</label>
                    <?php
                      echo "<input disabled name='author' type='text' class='form-control' id='author' value='".$_SESSION['userName']."'>"
                    ?>
                </div>
                <div class="form-group col">
                    <label for="date">Date:</label>
                    <?php
                        echo "<input disabled name='date' type='text' class='form-control' id='date' value='" . date("d/m/Y") . "'>"
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="name">Name:</label>
                    <input name="name" type="text" class="form-control" id="name" required>
                </div>
                <div class="form-group col">
                    <label for="type">Type:</label>
                    <?php
                        require "../main/dbConnectionCHR.php";
                        $sql = "SELECT * FROM journal_types ORDER BY Journal_Type_Desc";
                        $result = mysqli_query($conn, $sql) or die("Error reading journal types - ".mysqli_error($conn));

                        echo "<select required class=\"form-control custom-select\" id=\"type\" name=\"type\">";
                        while ($row = mysqli_fetch_array($result))
                        {
                            echo "<option value=\"$row[Journal_Type_Code]\">$row[Journal_Type_Desc]</option>";
                        }
                        echo "</select>";
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="text">Text:</label>
                    <textarea name="text" class="form-control" rows="5" id="text" required></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
            
        </form>
    </div>	

    <?php
        include('../main/footer.php');
        //close db connection
        mysqli_close($conn);
    ?>
    </body>
</html>