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

<hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">About CHR </h2>
        <p></p>
				<p class="lead">Caprivi  Healthcare  Research  (CHR)  is  a  non-profit  organisation.  The  CHR  specialises 1in   research,   designing   and   developing   Cloud   healthcare   solutions   in   developing countries,  particularly  for  remote  clinics.</p>
				<p class="lead">The  CHR  have  been  delivering  Cloud  based healthcare  research  services  since  2017.  The  CHR  mission  is  to  research,  educate  and empower disadvantaged community with ICT Cloud solutions particularly in developing countries.</p>  
				<p class="lead">CHR  has  a  number  of  ICT  services  that  they  intent  to  incorporated  on  their website  <a href="http://caprivihealthcareresearch.org/">http://caprivihealthcareresearch.org</a> that  will  help  to  expand  their  business global operations.</p>
	 	 </div>
      <div class="col-md-5 order-md-1">
			<img src="../images/AboutCHR.jpg" class="mx-auto d-block" alt="Could Research" width=100%>
      </div>
    </div>

<?php
	include('../main/footer.php');
?> 

</body>
</html>