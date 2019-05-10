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
		include('menu.php');
	?>
		
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="index.php">
	<img src="images/logo.png"/>	
</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>
	
	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
		  <li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  Research
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			  <a class="dropdown-item" href="../content/CloudResearch.html">Cloud Research</a>
			  <a class="dropdown-item" href="CloudComputing.html">What is Cloud Computing</a>
			  <a class="dropdown-item" href="CloudTypes.html">Cloud Types</a>
  			  <div class="dropdown-divider"></div>
			  <a class="dropdown-item" href="#">Research Project</a>			  
			</div>
		  </li>
		  <li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  Get Involved
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			  <a class="dropdown-item" href="#">Make Appointment</a>
			  <a class="dropdown-item" href="#">Subscribe to Newsletter</a>
			</div>
		  </li>
		 <li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  Our ICT Solutions
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			  <a class="dropdown-item" href="#">Make Appointment</a>
			  <a class="dropdown-item" href="#">Subscribe to Newsletter</a>
			</div>
		  </li>
		  <li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  About CHR
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			  <a class="dropdown-item" href="#">About CHR</a>
			  <a class="dropdown-item" href="#">Our Team</a>
			  <a class="nav-link" href="#">Contact Us</a>			 
     		  <a class="nav-link" href="#">Login</a>
			</div>
		   </li>
		</ul>
		<form class="form-inline my-2 my-lg-0">
		  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>
	  </div>
	</nav>
	
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