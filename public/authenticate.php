<?php 
// connect to db - use $con
require 'private/connect.php';

// get email strings
if (isset($_POST['email'])) {
	$email = mysqli_real_escape_string($con, $_POST['email']);
}
if (isset($_POST['password'])) {
	// TODO stop sending unhashed passwords to the server
	$password = $_POST['password'];
}

// query database
$result = mysqli_query($con,"SELECT * FROM Users WHERE email = '$email';");
$setrow = 0;

// count the number of times the email shows up
while($row = mysqli_fetch_array($result)) {
	$hashed_password = $row['Password'];
	$guid = $row['Guid'];
	$userID = $row['PID'];
	$setrow += 1;
}

// check if the password is correct
$login = false;
if (1 <= $setrow) {
	if (hash('sha256', $password.$guid) == $hashed_password) {
		$login = true;
	}
}

if ($login) {
	// generate a random number
	mt_srand((double)microtime()*10000);
	$randomSessionNumber = strtoupper(md5(uniqid(mt_rand(), true)));

	$sql="INSERT INTO Sessions (SessionKey, FID)
		VALUES ('$randomSessionNumber', '$userID')";
	$result = mysqli_query($con,$sql);
	if (!$result) {
		$error = '<p>There was an error connecting to the database. Please <a href="login.html">try again</a></p>';
		include "error.php";
		die('Error: ' . mysqli_error($con));
	}
	setcookie("user", $randomSessionNumber, time()+3600);
}
// Show appropriate content based on whether login was successfull

// TODO improve interface (include proper html header and refer the user to app.php automatically)
	if ($login) {
		$newURL = "app.php";
		header('Location: '.$newURL);
		die();
	} else {

?>
<html>
<head>
	<title>Log In Result</title>
</head>
<body>
	<h1>Login Results</h1>
	<?php 
		if (1 == $setrow) {
			?>
				<p>You entered the wrong password. Please press back and try again.</p>
			<?php
		} elseif (1 < $setrow) {
			// TODO figure out when this error would happen
			?>
				<p>Something weird happened. God help us all.</p>
			<?php
		} elseif (0 >= $setrow) {
			?>
				<p>That email is not registered. Please press back and try again.</p>
			<?php
		}
	}
	 ?>
</body>
</html>