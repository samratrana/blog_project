
 	

<?php

ob_start(); // session management

require('databaseconnection.php');

 	$total_failed_login = 3;
	$lockout_time       = 15;
	$account_locked     = false;

$user=$_POST['username'];

	// Check the database (Check user information)
    $data = $db->prepare( 'SELECT failed_login, last_login FROM members WHERE username = (:username) LIMIT 1;' );
	$data->bindParam( ':username', $user, PDO::PARAM_STR );
	$data->execute();
	$row = $data->fetch();

	// Check to see if the user has been locked out.
	if( ( $data->rowCount() == 1 ) && ( $row[ 'failed_login' ] >= $total_failed_login ) )  {
		// User locked out. Following line should not  be included when in 
		// production, comment out for competency
		echo "<pre><br />This account has been locked due to too many incorrect logins.</pre>";

		// Calculate when the user would be allowed to login again
		$last_login = strtotime( $row[ 'last_login' ] );
		$timeout    = $last_login + ($lockout_time * 60);
		$timenow    = time();

		// Shows the login attempt timings.  The three lines below should not be 
		// included when in production, comment out for competency
		print "The last login was: " . date ("h:i:s", $last_login) . "<br />";
		print "The timenow is: " . date ("h:i:s", $timenow) . "<br />";
		print "The timeout is: " . date ("h:i:s", $timeout) . "<br />";

		// Check to see if enough time has passed, if it hasn't locked the account
		if( $timenow < $timeout ) {
			$account_locked = true;
			print "The account is locked for time<br />";
		}
	} 

$tbl_name="members"; // Table name if you wish to use a variable

$select_sql = "SELECT password, salt, id FROM members WHERE username=:username;";
$statement = $db->prepare($select_sql);
$statement->bindParam(':username',$_POST['username']);
$statement->execute();
$pass = $statement->fetch();

$returnedpassword=$pass['password'];
$returnedsalt=$pass['salt'];
	
// take password, salt and encrypt it as we did in the register page
$salted_password=$returnedsalt.$_POST['password'];
$checkpassword = hash("sha512", $salted_password);

// If returned password matches entered password, valid login
if($checkpassword==$returnedpassword && $_POST['password']<>'' && $account_locked == false){
	// Register $myusername and redirect to file "login_success.php"
	session_start();
	$_SESSION['username'] = $_POST['username'];
	$_SESSION['userid'] = $pass['id'];
	header("location:login_success.php");
	// Reset bad login count
		$data = $db->prepare( 'UPDATE members SET failed_login = "0" WHERE username = (:username) LIMIT 1;' );
		$data->bindParam( ':username', $user, PDO::PARAM_STR );
		$data->execute();


	
}
else {
// Update bad login count
		$data = $db->prepare( 'UPDATE members SET failed_login = (failed_login + 1) WHERE username = (:username) LIMIT 1;' );
		$data->bindParam( ':username', $user, PDO::PARAM_STR );
		$data->execute();

		
		$message = 'Wrong Username or Password. Or Your account is locked Please try again!!';
		echo "<script type='text/javascript'>
				alert('$message');
			</script>";
		header("Refresh:0; url=main_login.php", true, 303);

	}

// Set the last login time.  This pauses the wait time to the 
// $lockout_time for each attempt.
	$data = $db->prepare( 'UPDATE members SET last_login = now() WHERE username = (:username) LIMIT 1;' );
	$data->bindParam( ':username', $user, PDO::PARAM_STR );
	$data->execute();

ob_end_flush();
?>
