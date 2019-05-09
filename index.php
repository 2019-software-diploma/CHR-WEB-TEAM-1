<?php
/**
 * Author: Edgar Hernandez
 * Date: 01/05/2019
 * Purpose: Main page of the Web Portal
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Caprivi Healthcare Research</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
	<?php
		include('menu.html');
	?>
    <form action="staff-list.php" method="post">
        <span>Book Type:</span>
            <select name="book_type">
                <option value="All">All</option>
                <option value="S">Soft cover</option>
                <option value="H">Hard cover</option>
                <option value="D">Digital</option>
            </select>
        <input type="submit" value="Search" class="bottom>
	
		<?php
			include('footer.html');
		?>
    </form>
</body>
</html>