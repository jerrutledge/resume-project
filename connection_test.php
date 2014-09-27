<html>
<head>
	<title>Resume Project</title>
</head>
<body>
	<h1>Database Initialization Results</h1>
<?php
// Create connection
$con=mysqli_connect("localhost","root","root");
$success = true;

// Check connection
if (mysqli_connect_errno()) { 
?>
	<p class="errortitle">Failed to connect to MySQL Server. </p>
	<p class="small">Error info: <?php echo mysqli_connect_error(); ?></p>
<?php
	$success = false;
}
else {
?>
	<p>Successfully connected to MySQL Server.</p>
<?php
}

// Create & connect to "resume" Table
if ($success) {
	// Create table
	$sql="CREATE DATABASE resume;";
	// Execute query
	if (mysqli_query($con,$sql)) {
?>
	<p>Created database "resume".</p>
<?php
	} else {
		$error = mysqli_error($con);
		if ("Can't create database 'resume'; database exists" == $error) {
?>
	<p>Database "resume" already exits.</p>
<?php
		} else {
?>
	<p class="errortitle">Failed to create database "resume".</p>
	<p class="small">Error info: <?php echo mysqli_error($con); ?></p>
<?php
			$success = false;
		}
	}
	if ($success) {
		if (mysqli_select_db($con, "resume")) {
?>
	<p>Connected to database resume.</p>
<?php
		} else {
?>
	<p class="errortitle">Failed to connect to database "resume".</p>
	<p class="small">Error info: <?php echo mysqli_error($con); ?></p>
<?php
		}
	}
}

// Create "Users" Table
if ($success) {
	// Create table
	$sql="CREATE TABLE Users(
			PID INT NOT NULL AUTO_INCREMENT, 
			PRIMARY KEY(PID),
			FirstName CHAR(30),
			LastName CHAR(30),
			Email TEXT,
			Password CHAR(64),
			Guid CHAR(36)
		)";
	// Execute query
	if (mysqli_query($con,$sql)) {
?>
	<p>Created table "users".</p>
<?php
	} else {
		$error = mysqli_error($con);
		if ("Table 'users' already exists" == $error) {
?>
	<p>Table "users" already exits.</p>
<?php
		} else {
?>
	<p class="errortitle">Failed to create table "users".</p>
	<p class="small">Error info: <?php echo $error; ?></p>
<?php
			$success = false;
		}
	}
}



?>
	</body>
</html>