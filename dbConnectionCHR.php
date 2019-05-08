<?php
 //Connect to database
 $USER     = "chr";
 $PASSWORD = "Pas4chr123!";
 $DBNAME   = "chrDB";
 $conn = mysqli_connect("52.237.241.24", $USER, $PASSWORD, $DBNAME, 3306)
            or die("mySQL server connection failed");
?>