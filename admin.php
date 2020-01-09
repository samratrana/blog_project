<?php
  ob_start();
  session_start();
  require 'config.php';
  require 'database.php';
  $g_title = BLOG_NAME . ' - Admin';
  $g_page = 'admin';
  require 'slidebar.php';
  require 'header.php';
  
  if(!isset($_SESSION['username'])){
	header("location:main_login.php");
}

	use PhpRbac\Rbac;
	$rbac = new Rbac();

	// Get Role Id
	$role_id = $rbac->Roles->returnId('admin');
	
	// Make sure User has 'forum_user' Role
	if ($rbac->Users->hasRole($role_id, $_SESSION['userid']))
	{
		$var_testoutput="<h2>You are admin, and should be here.</h2>";
	}
	else
	{
		$var_testoutput="<h2>You should not be here!</h2>";
	}
		
?>

<div class="w3-container w3-content w3-card-4 w3-margin-top" style="max-width:1000px;">
This is the Admin page
<?php 	echo $var_testoutput; ?>
</div>

<?php
  require 'footer.php';
?>
