<?php 
   session_name('myapp');         
   session_start();        
   if (empty($_SESSION['firstname']) || empty($_SESSION['User_level']))
   {
      echo "I am sorry but this page is only available to members who have logged in";
      echo " and who have cookies enabled to verify that.";
   }
   else
   {
		$now = time();
		if ($now > $_SESSION['expire'])
		{
			session_unset();
			echo "Your session has expired! <a href='login.php'>Login here</a>";
		}
		else
		{
		  $firstname = $_SESSION['firstname'];
		  $User_level = $_SESSION['User_level'];
		  
		  echo "<h1>Welcome user $firstname, to our member page.</h1>";
		  echo "<h3>You are Level is $User_level .</h3>";
		  echo "If wou want view your record, click <a href=\"personal_record.php\">View my Personal record</a><br><br><br>";
		  echo "<a href=\"logoff.php\">logoff</a>";
		}
	}
?>