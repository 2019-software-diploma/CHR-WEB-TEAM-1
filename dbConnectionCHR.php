<?php
/**
	 * Author: Marco Chalub
 * Date: 01/05/2019
 */
//Connect to database
//$HOST     = "52.237.241.24";
$HOST     = "localhost";
$PORT     = "3306";

//$USER     = "chr";
//$PASSWORD = "Pas4chr123!";
$USER     = "root";
$PASSWORD = "pass";
$DBNAME   = "chr";

$conn = mysqli_connect($HOST, $USER, $PASSWORD, $DBNAME, $PORT)
or die("MySQL Connection Error, Error:");

//header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); /               / La pagina ya expiró
//header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");    // Fue modificada
//header("Cache-Control: no-cache, must-revalidate");                 // Evitar guardado en cache del cliente HTTP/1.1
//header("Pragma: no-cache");                                         // Evitar guardado en cache del cliente HTTP/1.0
?>