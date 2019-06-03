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
                <p>Deleting...</p> 
            </div>
            <?php
                if (empty($_GET['journal_id']))
                    die("You must select a journal to delete");
                $journal_id = $_GET['journal_id'];
                //open the server connection
                require '../main/dbConnectionCHR.php'; 
                //delete the customer
                $sql = "DELETE FROM journals WHERE Journal_Number = $journal_id";
                $result = mysqli_query($conn, $sql) or die("Error deleting record - ".mysqli_error($conn));
                $numrows = mysqli_affected_rows($conn);
                if ($numrows == 1) {
                    echo "<div class=\"alert alert-success\">";
                    echo "<strong>Success!</strong> Publication deleted successfully.";
                    echo "</div>";
                }
                else {
                    echo "<div class=\"alert alert-danger\">";
                    echo "<strong>Error!</strong> Publication deleted failed. $numrows were inserted.";
                    echo "</div>";
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