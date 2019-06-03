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
            <p>Adding...</p> 
        </div>
        <?php 
            if (!empty($_SESSION['staffNumber'])
                && !empty($_GET['name'])
                && !empty($_GET['type'])
                && !empty($_GET['text']))
            { 
                $name = trim($_GET['name']);
                $type = $_GET['type'];
                $date = date("Y-m-d");
                $author = $_SESSION['staffNumber'];
                $text = trim($_GET['text']);
                
                //open the server connection
                require '../main/dbConnectionCHR.php'; 
                //update the record
                $sql = "INSERT INTO journals (`Journal_Name`, `Journal_Type`, `Publication_Date`, `Staff_Number`, `Journal_Text`)
                            VALUES('$name', '$type', '$date', $author, '$text')";

                $result = mysqli_query($conn, $sql) or die("Error inserting record ".mysqli_error($conn));
                $numrows = mysqli_affected_rows($conn);
                if ($numrows == 1) {
                    echo "<div class=\"alert alert-success\">";
                    echo "<strong>Success!</strong> Publication added successfully.";
                    echo "</div>";
                }
                else {
                    echo "<div class=\"alert alert-danger\">";
                    echo "<strong>Error!</strong> Publication add failed. $numrows were inserted.";
                    echo "</div>";
                }
            }
            else
            {
                die("You must supply all the Publication information");
            }
        ?>
        <br><a href="journals_list.php" class="btn btn-secondary" role="button">Publicantion List</a>
        <a href="journals_new.php" class="btn btn-primary" role="button">New Publicantion</a>
    </div>	

    <?php
        include('../main/footer.php');
        //close db connection
        mysqli_close($conn);
    ?>
    </body>
</html>