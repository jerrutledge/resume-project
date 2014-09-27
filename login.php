<?php 
	// Create connection
	$con=mysqli_connect("localhost","root","root","resume");
	$success = true;

	// Check connection
	if (mysqli_connect_errno()) { 
	?>
		<p class="errortitle">Failed to connect to MySQL Database. </p>
		<p class="small">Error info: <?php echo mysqli_connect_error(); ?></p>
	<?php
		$success = false;
	}

	if (isset($_POST['email'])) {
		$email = mysqli_real_escape_string($con, $_POST['email']);
	}
	if (isset($_POST['password'])) {
		$password = $_POST['password'];
	}

	$result = mysqli_query($con,"SELECT * FROM Users WHERE email = '$email';");
	// echo "SELECT * FROM Users WHERE email = '$email'";
	$setrow = 0;

	while($row = mysqli_fetch_array($result)) {
		$hashed_password = $row['Password'];
		$guid = $row['Guid'];
		$setrow += 1;
	}

	$login = false;
	if (1 <= $setrow) {
		if (hash('sha256', $password.$guid) == $hashed_password) {
			$login = true;
			setcookie("user", $email, time()+3600);
		}
	}
?>
<html>
<head>
	<title>Log In Result</title>
</head>
<body>
	<h1>Login Results</h1>
	<?php 
	if ($login) {
		?>
			<p>Congratulations. You have logged in. <a href="app.php">Click here</a>, to precede to the application.</p>
		<?php
	} elseif (1 == $setrow) {
		?>
			<p>You entered the wrong password. Please press back and try again.</p>
		<?php
	} elseif (1 < $setrow) {
		?>
			<p>Something weird happened. God help us all.</p>
		<?php
	} elseif (0 >= $setrow) {
		?>
			<p>That email is not registered. Please press back and try again.</p>
		<?php
	}
	 ?>
</body>
</html>