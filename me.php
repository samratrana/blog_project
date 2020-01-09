<?php
  require 'config.php';
  require 'database.php';
  $g_title = BLOG_NAME . ' - About Me';
  $g_page = 'me';
  require 'header.php';
  require 'slidebar.php';
?>
<div class="w3-container w3-content w3-card-4 w3-margin-top" style="max-width:1000px;">
		<div class="w3-container w3-center">
		    <h3>Blog by Samrat Singh</h3>
			<div class="w3-panel w3-center w3-xlarge">
			  <a href ="https://www.facebook.com/samrat.rana.188" <i class="fa fa-facebook-official w3-hover-opacity"></i></a>
			  <a href ="https://www.instagram.com/rana.samrat16/" <i class="fa fa-instagram w3-hover-opacity"></i></a>
			  <a href ="https://twitter.com/RanaSamrat16" <i class="fa fa-twitter w3-hover-opacity"></i></a>
			  <a href ="https://www.linkedin.com/in/samrat-singh-785566128/"  <i class="fa fa-linkedin w3-hover-opacity"></i></a>
			</div>
		<div class="w3-row w3-padding-32"> 

			<div class="w3-third">
			  <img class="w3-round-xxlarge" src="/blog/1.jpg" alt="Car" style="width:80%">
			</div>

			<div class="w3-third">
			  <img class="w3-round-xxlarge" src="/blog/2.jpg" alt="Car" style="width:80%">
			</div>


			<div class="w3-third">
			  <img class="w3-round-xxlarge" src="/blog/3.jpg" alt="Car" style="width:80%">
			</div>
		</div>
		</div>
</div>

	<?php
	require 'footer.php';
?>