<style type="text/css">
<!--
/* Pie de pagina*/
#footer {
	width: 100%;
	height: 40px;
	background: #333;
	border-top: 2px solid #000;
	position: absolute;
	bottom: 0;
	color:#FFFFFF;
}
-->
</style>
<div align="center" id="footer">
<?php
	if (isset($_SESSION['userName'])) {
		$username = $_SESSION['userName'];
		echo "User in session: $username &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='logoff.php'>Click Here to Log off</a>";
	}
	else
	{
		echo "Caprivi Healthcare Research";
	}
?>
</div>