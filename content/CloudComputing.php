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

  <div>
	<h2 class="featurette-heading">What is cloud Computing</h2>
  </div>
  <div>
	<h1></h1>
    <img src="../images/WhatisCC.png" class="mx-auto d-block" alt="Could Research" width=50%>
  </div>

  <div>
	<p class="lead">Cloud computing is an innovative paradigm that provides users with on-demand access to a shared pool of configurable computing resources such as servers, storage, and applications. The term “cloud” is a metaphor for the internet.</p> 
  	<p class="lead">In the past, all of your applications and software had to be on a computer or server that you could only access at a specific location. With the introduction of the cloud, people could access their programs and information using the internet as the conduit.</p> 
  	<p class="lead">This principle also applies to data storage. Rather than keeping folders full of critical work on your computers and servers, that data can be stored remotely and backed up to the cloud. Cloud computing is changing the way doctors, nurses, clinics, and hospitals deliver quality, cost-effective services to their patients. Health provider can be better visualised when it comes to managing millions of electronic patient records, integrating social and health care information, and developing the infrastructure to connect the countless trusts, hospitals, surgeries, and clinics.</p>
  </div>
</div>
<?php
	include('../main/footer.php');
?> 

</body>
</html>