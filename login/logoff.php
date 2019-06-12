<?php
/**
 * Author: Edgar Hernandez
 * Date: 01/05/2019
 * Purpose: Logoff of the Web Portal
 */
	session_start();
	//Remove all session varibles
	session_unset();
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

<h1>Thanks for visiting Caprivi!</h1>

<?php
	if (!empty($_GET['sessiondone']))
	{
		echo("<h5>Session has expired, please log in again.</h5>");
	}
	else
	{
		echo("<h5>You have now logged off.</h5>");
	}
?>


</div>	

<?php
	include('../main/footer.php');
?>
</body>
</html>


