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
                <p>Editing...</p> 
            </div>
        <?php
            if (!empty($_POST['name'])
                && !empty($_POST['type'])
                && !empty($_POST['text']))
            {
                $number = $_POST['number'];
                $name   = trim($_POST['name']);
                $type  = trim($_POST['type']);
                $text     = trim($_POST['text']);

                if (!$number || !$name || !$type || !$text)
                    die("Some book information has not been supplied");
                
                //open the server connection
                require '../main/dbConnectionCHR.php'; 
                //update the record
                $sql = "UPDATE journals SET Journal_Name='$name', Journal_Type='$type', Journal_Text='$text' WHERE Journal_Number=$number";
                $result = mysqli_query($conn, $sql) or die("Error updating record ".mysqli_error($conn));
                $numrows = mysqli_affected_rows($conn);
                if ($numrows == 1) {
                    echo "<div class=\"alert alert-success\">";
                    echo "<strong>Success!</strong> Publication edited successfully.";
                    echo "</div>";
                }
                else {
                    echo "<div class=\"alert alert-danger\">";
                    echo "<strong>Error!</strong> Publication edit failed. $numrows were inserted.";
                    echo "</div>";
                }
            }
            else
            {
                die("You must use the edit screen to supply values for the publication");
            }
           
        ?>
        <a href="journals_list.php" class="btn btn-secondary" role="button">Publicantion List</a>
        </div>	

    <?php
        include('../main/footer.php');
        //close db connection
        mysqli_close($conn);
    ?>
</body>
</html>