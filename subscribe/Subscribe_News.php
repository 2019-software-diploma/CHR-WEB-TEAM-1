<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<title>Caprivi Healthcare Research</title>
	<link rel="stylesheet" href="../css/custom.css" >
	<link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="../js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="../js/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="../js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	
</head>
<body>
	<?php
		include('../main/menu.php');
	?>

	<div class="container">
		<div class="jumbotron small">
			<h1>Newsletter</h1>
			<p>Subscribe to Newsletter!</p> 
		</div>

		<form class="needs-validation" action=Submit_Sub.php method=POST>
			<div class="row">
				<div class="form-group col">
					<label for="name">Full Name:</label>
					<input class="form-control" type=text id=name name=name required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group col">
					<label for = "email">E-Mail address:</label>
					<input class="form-control" type=text id=email name=email pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Valid e-mail, please." required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
			</div>
			<div class="alert alert-success">
				Below is Hard copy. Please type in.
			</div>
			<div class="form-group row">
				<div class="col">
					<label for = "Address">Postal Address:</label>
					<input class="form-control" type=text id=address name=address required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="col">
					<label for = "Company">Company:</label>
					<input class="form-control" type=text id=company name=company required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
			</div>
			<div class="form-group row">
				<div class="col">
					<label for = "Profession">Profession: </label>
					<input class="form-control" type=text id=profession name=profession required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="col">
					<label for = "Workposition">Work position: </label>
					<input class="form-control" type=text id=work name=work required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
			</div>
			<button type="submit" class="btn btn-success">Submit</button>
		</form>
	</div>	

	<?php
		include('../main/footer.php');
	?>
	</body>
</html>