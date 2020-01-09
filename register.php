<?php
require 'config.php';
require 'database.php';
$g_title = BLOG_NAME . ' - Register';
$g_page = 'register';
require 'slidebar.php';
require 'header.php';
require('databaseconnection.php');

ob_start();
session_start();

$tbl_name="members"; // Table name if you wish to use a variable

$myusername=$_POST['myusername'];
$myemail=$_POST['myemail'];
$mypassword=$_POST['mypassword'];
$mypassword2=$_POST['mypassword2'];

$errors = array();

if(isset($_SESSION['username'])){
$message = 'You are already logged in.';
echo "<script type='text/javascript'>
alert('$message');
</script>";
header("Refresh:0; url=index.php", true, 303);
}
?>


<div class="w3-container w3-content w3-card-4 w3-margin-top" style="max-width:1000px;">

	<form class="w3-container" name="form1" method="post" action="register.php">
		<h6>Username</h6>
		<input name="myusername" type="text" id="myusername" value="<?=$myusername?>" required alt="Username"  class="w3-input">
		<h6>Email ID</h6>
		<input name="myemail" type="email" id="myemail" value="<?=$myemail?>"  class="w3-input" required>
		<h6>Password</h6>
		<input name="mypassword" type="password" id="mypassword"  class="w3-input" required>
		<h6>Verify Password</h6>
		<input name="mypassword2" type="password" id="mypassword2"  class="w3-input" required>
		<br>
		<button class="w3-btn w3-black" type="submit" name="Submit">Register</button>
	</form>

	<?php
	if (isset($_POST['mypassword']))
	{

	if (empty($myusername)) { array_push($errors, "Username required!"); }
	if (empty($myemail)) { array_push($errors, "Email is required!"); }
	if (empty($mypassword)) { array_push($errors, "Password required!"); }
	if (empty($mypassword2)) { array_push($errors, "Please confirm password!"); }

	if (!filter_var($myemail, FILTER_VALIDATE_EMAIL)) { array_push($errors, "Email is not valid!"); }
	if ($mypassword != $mypassword2) { array_push($errors, "The two passwords do not match!"); }

	$user_check_query = "SELECT username, email FROM members WHERE username=:myusername OR email=:myemail LIMIT 1";
	$statement = $db->prepare($user_check_query);
	$statement->bindParam(':myusername',$myusername);
	$statement->bindParam(':myemail',$myemail);
	$statement->execute() or die(print_r($statement->errorInfo(), true));
	$user = $statement->fetch();

	if ($user) { // if user exists, which field?
	if ($user['username'] == $myusername) {array_push($errors, "Username already exists!");}
	if ($user['email'] == $myemail) {array_push($errors, "Email already exists!");}
	}

	if (count($errors) == 0) {
	// salting adds uniqueness to each entry
	$salt=uniqid() ;
	$salted_password=$salt.$mypassword;
	$encrypted_password = hash("sha512", $salted_password);

	$insert_sql="insert into members (username,password,salt,email) values (:myusername,:encrypted_password,:salt,:myemail)";
	$statement = $db->prepare($insert_sql);
	$statement->bindParam(':myusername',$myusername);
	$statement->bindParam(':encrypted_password',$encrypted_password);
	$statement->bindParam(':salt',$salt);
	$statement->bindParam(':myemail',$myemail);
	$statement->execute() or die(print_r("User already registered. Please login.", true));
	$pass = $statement->fetch();

	$message = 'New User Registered. Login now.';
	echo "<script type='text/javascript'>
	alert('$message');
	</script>";
	header("Refresh:0; url=main_login.php", true, 303);
	}
	else{
	foreach ($errors as $error) {
	echo "<p>$error</p>";
	}
	}
	}
	?>
</div>

<?php
ob_end_flush();
require 'footer.php';
?>

