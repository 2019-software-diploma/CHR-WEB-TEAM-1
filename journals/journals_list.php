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
    <link rel="stylesheet" href="../css/custom.css" >
	<link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="../js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="../js/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="../js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	
</head>
<body>
<?php
	include('../main/menu.php');
?>

<div class="container">
    <?php
        //read session field and die it it's empty
        //if (empty($_SESSION['userName']))
        //    die("You must log in!");

        //open db connection
        require '../main/dbConnectionCHR.php';

        //general search for journal
        $sql = "SELECT j.Journal_Number,
                    j.Journal_Name,
                    j.Staff_Number,
                    j.Journal_Text,
                    (SELECT jt.Journal_Type_Desc FROM journal_types jt
                        WHERE jt.Journal_Type_Code = j.Journal_Type) AS Journal_Type,
                    j.Publication_Date,
                    (SELECT CONCAT(s.First_Name, ' ', s.Surname) FROM staff s
                        WHERE s.Staff_Number = j.Staff_Number) AS Journal_Author
                    FROM journals j";
        
        //in case of receive a specific search variable
        if (!empty($_GET['searchStr'])) {
            $searchStr = $_GET['searchStr'];
            
            //splits string by blank space
            $searchStrs = explode(" ", $searchStr);

            foreach ($searchStrs as $i => $str) {//it goaes through each word
                if ($i > 0)//add 'WHERE' for the first iteration and 'OR' for the rest of them
                    $sql = $sql." OR";
                else
                    $sql = $sql." WHERE";
                
                //finds the journal by each string considering name, type and text fields
                $sql = $sql." j.Journal_Name LIKE '%$str%'";
                $sql = $sql." OR j.Journal_Type LIKE '%$str%'";
                $sql = $sql." OR j.Journal_Text LIKE '%$str%'";
            }
        }

        $result = mysqli_query($conn, $sql) or die("Error reading books ".mysqli_error($conn));

        while ($row = mysqli_fetch_array($result))
        {
            echo "<div class='card bg-light'>";
            echo "    <div class='card-body'>";
            echo "        <h5 class='card-title'>$row[Journal_Name] | $row[Journal_Type] #$row[Journal_Number]</h5>";
            echo "       <p class='card-text'>$row[Journal_Text]</p>";
            $d = strtotime($row['Publication_Date']);
            echo "        <p class='card-text'><small class='text-muted'>".date('l jS \of F Y', $d)."</small></p>";
            
            if (!empty($_SESSION['userName']) && $_SESSION['staffNumber'] == $row['Staff_Number']) {
                echo "<td ><a class='btn btn-outline-warning btn-sm' href=journals_edit.php?journal_id=$row[Journal_Number]>Edit</a> ";
                echo "<a class='btn btn-outline-danger btn-sm' data-href=\"journals_delete.php?journ\l_id=$row[Journal_Number]\" data-toggle=\"modal\" data-target=\"#confirm-delete\">Delete</a></td>";
            }
            else {
                echo "<td ><a class='btn btn-outline-warning btn-sm' href=journals_edit.php?journal_id=$row[Journal_Number]>Read</a> ";
            }

            echo "    </div>";
            echo "</div>";
        }
        
        // //build result html
        // echo "<table class='table'>";
        // echo "<thead class='thead-dark'><tr>
        //             <th>Publication</th>
        //             <th>Name</th>
        //             <th>Type</th>
        //             <th>Date</th>
        //             <th>Author</th>
        //             <th>Action</th></tr>";

        // //dynamic book list
        // while ($row = mysqli_fetch_array($result))
        // {
        //     echo "</thead><tr>";
        //     echo "<td>$row[Journal_Number]</td>";
        //     echo "<td>$row[Journal_Name]</td>";
        //     echo "<td>$row[Journal_Type]</td>";
        //     $d = strtotime($row['Publication_Date']);
        //     echo "<td>" . date("d/m/Y", $d) . "</td>";
        //     echo "<td>$row[Journal_Author]</td>";

        //     if (!empty($_SESSION['userName']) && $_SESSION['staffNumber'] == $row['Staff_Number']) {
        //         echo "<td ><a class='btn btn-outline-warning btn-sm' href=journals_edit.php?journal_id=$row[Journal_Number]>Edit</a> ";
        //         echo "<a class='btn btn-outline-danger btn-sm' data-href=\"journals_delete.php?journ\l_id=$row[Journal_Number]\" data-toggle=\"modal\" data-target=\"#confirm-delete\">Delete</a></td>";
        //     }
        //     else {
        //         echo "<td ><a class='btn btn-outline-warning btn-sm' href=journals_edit.php?journal_id=$row[Journal_Number]>Read</a> ";
        //     }

        //     echo "</tr>";
        // }
        // echo "</table>";

        if (!empty($_SESSION['userName']))
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