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
	<h2 class="featurette-heading">Cloud Research</h2>
</div>
<div>
        <img src="../images/Research-Cloud.png" class="mx-auto d-block" alt="Could Research" width=50%>
</div>

<div>
  <p class="lead">Let's look at the benefits for doing your research using cloud computing.</p>
  <p class="lead">Improve the quality of your research.A cloud could provide you with faster, more advanced or more scalable resources to enable you to run tasks that you cannot manage with your existing resources whether these be within your department, institution or the wider academic community.</p> 
  <p class="lead">Similarly, cloud resources may allow you to derive more accurate results than you can achieve at present.
	Improve the quantity of your research, This can be enabled by access to more powerful resources that allow you to run your analyses faster.</p> 
  <p class="lead">A cloud can provide you with resources over which you have greater control.</p>
  <p class="lead">You may have the freedom to install software and use it as soon as you need it, rather than having to rely on system administrators at your institution to do this for you.</p> 
  <p class="lead">You can provision resources quickly, rather than waiting for hardware to be ordered, delivered and installed at your institution.
	Improve cost-effectiveness.</p> 
  <p class="lead">It may be cheaper to use a cloud than to order, install and support new hardware within your institution.</p> 
  <p class="lead">Delivering long-term access to your services and data resources, by promoting reuse of these resources, you may contribute to the cost-effectiveness of other researchers, saving them from having to expend effort repeating work you have already done.
	Reduce environmental impact.</p> 
  <p class="lead">Cloud can offer the potential for you to reduce your environmental impact. Physical resources in a cloud are generally virtualised and can host a number of independent virtual hardware instances that can be used by a number of different projects. If these projects or institutions each had separate physical hardware resources, they might sit idle for a significant amount of the time, consuming power and space and requiring cooling.</p>
</div>	
</div>

<?php
	include('../main/footer.php');
?> 

</body>
</html>