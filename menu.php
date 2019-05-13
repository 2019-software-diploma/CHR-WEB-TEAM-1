<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="index.php"><img src="images/logo.png"/></a>
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
		  <a class="dropdown-item" href="ResearchProject.html">Research Project</a>			  
		</div>
	  </li>
	  <li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		  Get Involved
		</a>
		<div class="dropdown-menu" aria-labelledby="navbarDropdown">
		  <a class="dropdown-item" href="MakeAppointment.php">Make Appointment</a>
		  <a class="dropdown-item" href="SubscribeNewsletter.php">Subscribe to Newsletter</a>
		</div>
	  </li>
		<li class="nav-item">
		<a class="nav-link" href="Login.html">Publications</a>
		</li>
	  <li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		  About CHR
		</a>
		<div class="dropdown-menu" aria-labelledby="navbarDropdown">
		  <a class="dropdown-item" href="AboutCHR.html">About CHR</a>
		  <a class="dropdown-item" href="OurTeam.html">Our Team</a>	 
		</div>
	   </li>
		<li class="nav-item">
		<a class="nav-link" href="ContactUs.html">Contact Us</a>
		</li>
		<li class="nav-item">
		<a class="nav-link" href="Login.html" data-toggle="modal" data-target="#loginModal" data-whatever="@mdo">Login</a>
		</li>
	</ul>
	<form class="form-inline my-2 my-lg-0">
	  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
	  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
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
	<form class="needs-validation" novalidate action="login.php" method="POST">
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<button class="btn btn-primary" type="submit">Initiate Session</button>
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