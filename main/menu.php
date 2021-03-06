<?php
/**
 * Author: Edgar Hernandez
 * Date: 01/05/2019
 * Purpose: Main page of the Web Portal
 */
?>

<nav class="navbar navbar-expand navbar-light flex-column flex-md-row bd-navbar sticky-top" id="menu">

	<a class="navbar-brand" id="chrLogo" href="../main/index.php"><img src="../images/logo.png"/></a>
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
		  <a class="dropdown-item" href="../content/CloudResearch.php">Cloud Research</a>
		  <a class="dropdown-item" href="../content/CloudComputing.php">What is Cloud Computing</a>
		  <a class="dropdown-item" href="../content/CloudTypes.php">Cloud Types</a>
		</div>
	  </li>
	  <li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		  Get Involved
		</a>
		<div class="dropdown-menu" aria-labelledby="navbarDropdown">
		  <a class="dropdown-item" href="../subscribe/subscribe_news.php">Subscribe to Newsletter </a>
		  <a class="dropdown-item" href="../appointments/appointment_new.php">Make Appointment</a>
		</div>
	  </li>
		<li class="nav-item">
		<a class="nav-link" href="../journals/journals_list.php">Publications</a>
		</li>
	  <li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		  About CHR
		</a>
		<div class="dropdown-menu" aria-labelledby="navbarDropdown">
		  <a class="dropdown-item" href="../content/AboutCHR.php">About CHR</a>
		  <a class="dropdown-item" href="../content/OurTeam.php">Our Team</a>	 
		</div>
	   </li>
		<li class="nav-item">
		<a class="nav-link" href="../content/ContactUs.php">Contact Us</a>
		</li>
		<?php
		if (!isset($_SESSION['userName'])) {
			echo "<li class='nav-item'>";
			echo "<a class='nav-link' href='#' data-toggle='modal' data-target='#loginModal' data-whatever='@mdo'>Login</a>";
			echo "</li>";
		}
		else
		{
			echo "<li class='nav-item dropdown'>";
			echo "	<a class='nav-link dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>$_SESSION[userName]</a>";
			echo "	<div class='dropdown-menu'>";
			echo "		<a class='dropdown-item' href='../journals/journals_list.php?staffNumber=$_SESSION[staffNumber]' >My Publications</a>";
			echo "		<a class='dropdown-item' href='../login/login.php?manageportal=1' >Manage</a>";
			echo "		<a class='dropdown-item' href='../login/logoff.php' >Logoff</a>";
			echo "	</div>";
			echo "</li>";
		}
		?>
	</ul>
	<form class="form-inline my-2 my-lg-0" action="../journals/journals_list.php" method="GET">
	  <input class="form-control form-control-sm mb-0 mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="searchStr" name="searchStr">
	  <button class="btn btn-danger btn-sm my-sm-0" type="submit">Search</button>
	</form>
	</div>
	
</nav>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	<form class="needs-validation" novalidate action="../login/login.php" method="POST">
      <div class="modal-body">
			<div class="form-group">
				<label for="InputEmail1">Email address</label>
				<input type="email" class="form-control" name="InputEmail" id="InputEmail" aria-describedby="emailHelp" placeholder="Enter email" required>
			</div>
			<div class="form-group">
				<label for="InputPassword1">Password</label>
				<input type="password" class="form-control" name="InputPassword" id="InputPassword" placeholder="Password" maxlength="6" required>
				<small id="emailHelp" class="form-text text-muted">Only 6 characters. Don't share your password with anyone else.</small>
			</div>       
      </div>
      <div class="modal-footer">
				<button class="btn btn-success" type="submit">Initiate Session</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>		
      </div>
	 </form>

	<script>
		// Example starter JavaScript for disabling form submissions if there are invalid fields
		(function() {
			'use strict';
			window.addEventListener('load', function() {
				// Fetch all the forms we want to apply custom Bootstrap validation styles to
				var forms = document.getElementsByClassName('needs-validation');
				// Loop over them and prevent submission
				var validation = Array.prototype.filter.call(forms, function(form) {
					form.addEventListener('submit', function(event) {
						if (form.checkValidity() === false) {
							event.preventDefault();
							event.stopPropagation();
						}
						form.classList.add('was-validated');
					}, false);
				});
			}, false);
		})();
	</script>
	  </div>
	</div>
</div>
