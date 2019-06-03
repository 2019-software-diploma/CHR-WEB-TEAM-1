<?php
/**
 * Author: Edgar Hernandez
 * Date: 01/05/2019
 * Purpose: Main page of the Web Portal
 */
 session_start();

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="en">
<?php
	include('../main/head.php');
?>
<body>
<?php
	include('menu.php');
?>

<main role="main">

<div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../images/index1.jpg" class="d-block w-100" alt="Cloud Research">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="btn btn-warning btn-light"><a href="../content/CloudResearch.php">Cloud Research</a></h5>
        </div>
      </div>
      <div class="carousel-item">
        <img src="../images/index2.jpg" class="d-block w-100" alt="Research Project">
        <div class="carousel-caption d-none d-md-block">
        <h5 class="btn btn-success btn-light"><a href="../content/ResearchProject.php">Research Project</a></h5>
        </div>
      </div>
      <div class="carousel-item">
        <img src="../images/index3.jpg" class="d-block w-100" alt="What is cloud computing?">
        <div class="carousel-caption d-none d-md-block">
        <h5 class="btn btn-success btn-light"><a href="../content/CloudComputing.php">What is cloud computing?</a></h5>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<?php
	include('footer.php');
?> 

</main>

</body>
</html>