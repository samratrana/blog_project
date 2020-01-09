<?php
  require 'config.php';
  require 'database.php';
  $g_title = BLOG_NAME . ' - logout';
  $g_page = 'logout';
  require 'slidebar.php';
  require 'header.php';
 
?>


<?php 
// Put this code in first line of web page. 
session_start();

session_destroy();
$message = 'Logged Out Successfully!!';
echo "<script type='text/javascript'>
	alert('$message');
	</script>";
header("Refresh:0; url=index.php", true, 303);

?>


<?php
  require 'footer.php';
?>
