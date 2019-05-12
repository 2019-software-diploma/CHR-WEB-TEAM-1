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

<script src="js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="js/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
</head>
<body>
	<?php
		include('menu.php');
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
			include('footer.php');
		?>
    </form>
</body>
</html>