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
            $title = "$row[Journal_Name] | $row[Journal_Type] #$row[Journal_Number]";
            $text = "$row[Journal_Text]";

            echo "<div class='card-deck'>";
            echo "<div class='card border-light mb-3'>";
            echo "    <div class='card-body'>";
            echo "        <h5 class='card-title'>$title</h5>";

            if (strlen($text) > 100) {
                echo substr($text, 0, 100);
                echo "<span class='collapse' id='readmore'>";
                echo substr($text, 101, strlen($text));
                echo "</span> <a class='badge badge-pill badge-primary' data-toggle='collapse' data-target='#readmore'>... &raquo;</a>";
            } else
                echo "       <p class='card-text'>$text</p>";

            $d = strtotime($row['Publication_Date']);
            echo "        <p class='card-text'><small class='text-muted'>".date('l jS \of F Y', $d)."</small></p>";
            
            if (!empty($_SESSION['userName']) && $_SESSION['staffNumber'] == $row['Staff_Number']) {
                echo "<td ><a class='badge badge-primary' href=journals_edit.php?journal_id=$row[Journal_Number]>Edit</a> ";
                echo "<a class='badge badge-light' href='#' data-href='journals_delete.php?journal_id=$row[Journal_Number]' data-toggle=\"modal\" data-target=\"#confirm-delete\">Delete</a></td>";
            }
            else {
                echo "<td ><a class='badge badge-primary' href=journals_edit.php?journal_id=$row[Journal_Number]>Details</a> ";
            }
            
            echo "      </div>";
            echo "    </div>";
            echo "</div>";
        }
        
        if (!empty($_SESSION['userName']))
            echo "<br><br><a class='btn btn-primary' href=journals_new.php>New Publication</a>";
    ?>
    </div>	

<?php
    // include('../main/footer.php');
    // //close db connection
    // mysqli_close($conn);
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