<?php
  require 'config.php';
  require 'database.php';
  $g_title = BLOG_NAME . ' - Login';
  $g_page = 'login';
  require 'slidebar.php';
  require 'header.php';
  
  
session_start();

if(isset($_SESSION['username'])){
	header("location:index.php");
} 
?>

<div class="w3-container w3-content w3-card-4 w3-margin-top" style="max-width:1000px;">
<form  class="w3-container"name="form1" method="post" action="checklogin.php">

<h6>Username<h6>
<td><input class="w3-input w3-hover-white" name="username" id="username" required></td>
<h6>Password</h6>
<input class="w3-input w3-hover-white" name="password" id="password" type="password" required>
<br>
<button class="w3-btn w3-black" type="submit">Login</button>
</tr>
</td>
</form>
</div>
<?php
  require 'footer.php';
?>

