<?php
/**
 * Author: Edgar Hernandez
 * Date: 01/05/2019
 * Purpose: Main page of the Web Portal
 */
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<title>Caprivi Healthcare Research</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<?php
	include('../main/menu.php');
?>
	
<div class="container">
<p>Cloud Types</p>
<p>Depending on the type of data you’re working with, you’ll want to compare public, private, and hybrid clouds in terms of the different levels of security and management required.
   Public Cloud – Public clouds are provided by commercial organisations who generally offer a range of cloud related services and resources and who bill users for their usage. Examples of public clouds are Amazon EC2, Microsoft Azure, Google Cloud, DigitalOcean, FlexiScale and Rackspace.
   Private Cloud – Private clouds are set up within a specific private community. This may be a single institution or a group of individuals in a collaboration across multiple locations. This gives the institution or “cloud owner” complete control over the cloud deployment.
   Hybrid Cloud – using both private and public clouds, depending on their purpose. You host your most important applications on your own servers to keep them more secure and secondary applications elsewhere.
   Community Cloud – Community clouds are created for specific communities. These could be organisations who have entered into strategic partnerships or who serve particular communities. A high-profile example of a previous community cloud is NASA’s Nebula, another example is EGI's Federated Cloud.</p>
</div>	
<?php
	include('../main/footer.php');
?> 

</body>
</html>