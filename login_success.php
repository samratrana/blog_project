<?php
  require 'config.php';
  require 'database.php';
  $g_title = BLOG_NAME . ' - Profile';
  $g_page = 'logout';
  require 'slidebar.php';
  require 'header.php';

session_start();

if(!isset($_SESSION['username'])){
	header("location:main_login.php");
}

?>

<div class="w3-container w3-content w3-card-4 w3-margin-top" style="max-width:1000px;">
<form  class="w3-container w3-center" name="form1" method="post" action="logout.php">
	<h3>Welcome <?= $_SESSION['username']?>. You are successfully logged in.</h3>
	<button class="w3-btn w3-black" type="submit">Logout</button>
</form>
</div>
		
<?php
  require 'footer.php';
?>
