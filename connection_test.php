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

function createTable($tableName, $columnParams, $con) {
	// return value of whether or not the table was successfully created/detected
	$sscc = true;
	// Create table
	$sql="CREATE TABLE ".$tableName."(".$columnParams.");";
	// Execute query
	if (mysqli_query($con,$sql)) {
?>
	<p>Created table "<?php echo $tableName; ?>".</p>
<?php
	} else {
		$error = mysqli_error($con);
		if ("Table '".strtolower($tableName)."' already exists" == $error) {
?>
	<p>Table "<?php echo $tableName; ?>" already exits.</p>
<?php
		} else {
		$error = mysqli_error($con);
?>
	<p class="errortitle">Failed to create table "<?php echo $tableName; ?>".</p>
	<p class="small">Error info: <?php echo $error; ?></p>
<?php
			$sscc = false;
		}
	}
	return $sscc;
}

// Create "Users" Table
if ($success) {
?>
<h2>Creating Tables</h2>
<?php
	$usersCreate = "
			PID INT NOT NULL AUTO_INCREMENT, 
			PRIMARY KEY(PID),
			FirstName CHAR(30),
			LastName CHAR(30),
			Email TEXT,
			Password CHAR(64),
			Guid CHAR(36)";
	if (createTable("Users", $usersCreate, $con) == false) {
		$success = false;
	}
	$skillsCreate = "
		PID INT NOT NULL AUTO_INCREMENT, 
		PRIMARY KEY(PID),
		Contents TEXT,
		Display BOOL,
		FID INT,
		FOREIGN KEY (FID) REFERENCES Users(PID)
	";
	if (createTable("Skills", $skillsCreate, $con) ==  false) {
		$success = false;
	}
}

?>
	</body>
</html>