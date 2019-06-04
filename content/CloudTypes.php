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
<?php
	include('../main/head.php');
?>
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