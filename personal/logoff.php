<?php 
            session_name('myapp');         
            session_start();
            session_destroy();                  
?>
<html>
<h1>You have now logged off! Thank you!</h1>      
<a href="Access_Login.php">View Again personal record</a>
</html>