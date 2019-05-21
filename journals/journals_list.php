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
        .btn-primary, .btn-secondary, .btn-success {
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
        //read session field and die it it's empty
        if (empty($_SESSION['userName']))
            die("You must log in!");

        //open db connection
        require '../main/dbConnectionCHR.php';

        $sql = "SELECT j.Journal_Number,
                    j.Journal_Name,
                    (SELECT jt.Journal_Type_Desc FROM journal_types jt
                        WHERE jt.Journal_Type_Code = j.Journal_Type) AS Journal_Type,
                    j.Publication_Date,
                    (SELECT s.First_Name FROM staff s
                        WHERE s.Staff_Number = j.Staff_Number) AS Journal_Author
                    FROM journals j
                    WHERE j.Staff_Number = ".$_SESSION['staffNumber'];

        $result = mysqli_query($conn, $sql) or die("Error reading books ".mysqli_error($conn));

        //build result html
        echo "<table class='table'>";
        echo "<thead class='thead-dark'><tr>
                    <th>Publication</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Author</th>
                    <th>Action</th></tr>";

        //dynamic book list
        while ($row = mysqli_fetch_array($result))
        {
            echo "</thead><tr>";
            echo "<td>$row[Journal_Number]</td>";
            echo "<td>$row[Journal_Name]</td>";
            echo "<td>$row[Journal_Type]</td>";
            $d = strtotime($row['Publication_Date']);
            echo "<td>" . date("d/m/Y", $d) . "</td>";
            echo "<td>$row[Journal_Author]</td>";
            echo "<td ><a class='btn btn-outline-warning btn-sm' href=journals_edit.php?journal_id=$row[Journal_Number]>Edit</a> " .
            "<a class='btn btn-outline-danger btn-sm' data-href=\"journals_delete.php?journal_id=$row[Journal_Number]\" data-toggle=\"modal\" data-target=\"#confirm-delete\">Delete</a></td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "<br><br><a class='btn btn-primary' href=journals_new.php>New Publication</a>";
    ?>
    </div>	

<?php
    include('../main/footer.php');
    //close db connection
    mysqli_close($conn);
?>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Delete confirmation
            </div>
            <div class="modal-body">
                Are you sure you want to delete this publication?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>
<script>
    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
</script>
</body>
</html>