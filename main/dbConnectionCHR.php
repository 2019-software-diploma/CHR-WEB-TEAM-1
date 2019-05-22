<?php
/**
* Author: Marco Chalub
* Date: 01/05/2019
*/
//Connect to database
$HOST     = "52.237.241.24";
//$HOST     = "localhost";
$PORT     = "3306";

$USER     = "chr";
$PASSWORD = "Pas4chr123!";
//$USER     = "root";
//$PASSWORD = "pass";
$DBNAME   = "chr";

$conn = mysqli_connect($HOST, $USER, $PASSWORD, $DBNAME, $PORT)
or die("MySQL Connection Error, Error:");
?>