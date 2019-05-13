<div mmdw="0"  align="center">
<!--MMDW 0 --><?php
	if (isset($_SESSION['userName'])) {
		$username = $_SESSION['userName'];
		echo "User in session: $username";
		echo "<br>";
		echo "<a href='logoff.php'>Click Here to Log off</a>";
	}
?><!--MMDW 1 -->
<br/>
<h6 mmdw="1"  align="center">Caprivi Healthcare Research</h6>
</div><!-- MMDW:success -->