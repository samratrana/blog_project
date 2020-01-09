<?php
  require_once 'PhpRbac/autoload.php'; 
  if (!isset($g_page)) {
      $g_page = '';
  }

	use PhpRbac\Rbac;
	$rbac = new Rbac();
	$role_id = $rbac->Roles->returnId('admin');

session_start();
?>

<!-- Side Navigation -->
<nav class="w3-sidebar w3-bar-block w3-card w3-animate-left w3-center" style="display:none" id="mySidebar">
	  <h1 class="w3-xxxlarge w3-text-theme">Navigation</h1>
	  <button class="w3-bar-item w3-button" onclick="w3_close()">Close <i class="fa fa-remove"></i></button>
	  <a href="index.php" class="w3-bar-item w3-button w3-xlarge">Home</a>
	  
	<?php if(isset($_SESSION['username'])) {?>
	 
				<a href="create.php" class="w3-bar-item w3-button w3-xlarge">New Post</a>
				<a href="login_success.php" class="w3-bar-item w3-button w3-xlarge">Profile</a>
				
		
	<?php  if(isset($_SESSION['username']) && $rbac->Users->hasRole($role_id, $_SESSION['userid'])){ ?>  
	
	  
				<a href="admin.php" class="w3-bar-item w3-button w3-xlarge">Admin</a>
				
	<?php 
	}  
	}
	else 
	{                   
	?>  
				<a href="main_login.php" class="w3-bar-item w3-button w3-xlarge">Login</a>
				<a href="register.php" class="w3-bar-item w3-button w3-xlarge">Register</a>
	<?php 
	} 
	?>
	
				<a href="me.php" class="w3-bar-item w3-button w3-xlarge">About Me</a>
				
</nav>

	<div id="main">
		<header class="w3-container w3-theme w3-padding" id="myHeader">
		  <i onclick="w3_open()" class="fa fa-bars w3-xlarge w3-button w3-theme"></i> 
			  <div class="w3-center w3-padding-16">
			  <h4>Go Jets Go</h4>
			  <h1 class="w3-xxxlarge w3-animate-bottom"><?=$g_title?></h1>
			  </div>
		</header>

<script>
// Side navigation
function w3_open() {
  var x = document.getElementById("mySidebar");
  x.style.width = "100%";
  x.style.fontSize = "40px";
  x.style.paddingTop = "10%";
  x.style.display = "block";
}
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>
