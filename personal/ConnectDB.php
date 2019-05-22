<?php
 //Connect to database
 $USER     = "root";
 $PASSWORD = "";
 $DBNAME   = "CHR";
 $conn = mysqli_connect("localhost", $USER, $PASSWORD, $DBNAME)
            or die("mySQL server connection failed");
?>