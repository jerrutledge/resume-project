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

	// Generate a string of random characters
	function getGUID(){
		if (function_exists('com_create_guid')){
			return com_create_guid();
		}else{
			mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
			$charid = strtoupper(md5(uniqid(rand(), true)));
			$hyphen = chr(45);// "-"
			$uuid = substr($charid, 0, 8).$hyphen
				.substr($charid, 8, 4).$hyphen
				.substr($charid,12, 4).$hyphen
				.substr($charid,16, 4).$hyphen
				.substr($charid,20,12);
			return $uuid;
		}
	}
	$guid = getGUID();

	// check all fields are valid
	$valid = true;
	$err = "";
	if (isset($_POST['fname'])) {
		$fname = mysqli_real_escape_string($con, $_POST['fname']);
		if (strlen($fname) <= 0) {
			$valid = false;
			$err .= "<li>First Name is blank.</li>";
		}
	} else {
		$valid = false;
		$err .= "<li>First Name is not set.</li>";
	}
	if (isset($_POST['lname'])) {
		$lname = mysqli_real_escape_string($con, $_POST['lname']);
		if (strlen($lname) <= 0) {
			$valid = false;
			$err .= "<li>Last Name is blank.</li>";
		}
	} else {
		$valid = false;
		$err .= "<li>Last Name is not set.</li>";
	}
	if (isset($_POST['email'])) {
		$email = mysqli_real_escape_string($con, $_POST['email']);
		if (strlen($email) <= 0) {
			$valid = false;
			$err .= "<li>Email is blank.</li>";
		}
		$unique_email = true;
		$result = mysqli_query($con,"SELECT * FROM Users WHERE email = '$email'");
		while($row = mysqli_fetch_array($result)) {
			$unique_email = false;
		}
		if (!$unique_email) {
			$valid = false;
			$err .= "<li>There is already an account with that email.</li>";
		}
	} else {
		$valid = false;
		$err .= "<li>Email is not set.</li>";
	}
	if (isset($_POST['password'])) {
		$password = $_POST['password'];
		if (strlen($password) <= 6) {
			$valid = false;
			$err .= "<li>Password is not long enough.</li>";
		}
	} else {
		$valid = false;
		$err .= "<li>Password is not set.</li>";
	}
	if (isset($_POST['rpassword'])) {
		$rpassword = $_POST['rpassword'];
		if (strlen($rpassword) <= 0) {
			$valid = false;
			$err .= "<li>Repeat password is blank.</li>";
		}
	} else {
		$valid = false;
		$err .= "<li>Repeat Password is not set.</li>";
	}

	// execute SQL
	if ($valid && $success) {
		$sql="INSERT INTO Users (FirstName, LastName, Email, Password, Guid)
			VALUES ('$fname', '$lname', '$email', '".hash('sha256', $password.$guid)."', '$guid')";
		if (!mysqli_query($con,$sql)) {
			die('Error: ' . mysqli_error($con));
		}
	}
?>
<html>
<head>
	<title>Thank you for Signing Up!</title>
</head>
<body>
	<h1>Thank you for Signing Up!</h1>
	<?php 
		if ($valid) {
			?>
				<p>Your data appears valid, and we will send you an email shortly.</p>
			<?php
		} else {
			?>
				<p>Unfortunately, your data doesn't seem valid at all. Please press the 'back' button on your browser and try again. See list below the table for more information.</p>
			<?php
		}
	?>
	<p>This is the data we recorded:</p>
	<table>
		<thead>
			<tr>
				<th>Field Name</th>
				<th>Field Value</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>First Name</td>
				<td><?php if (isset($fname)) {echo $fname;} else {echo "Variable not set.";} ?></td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td><?php  if (isset($lname)) {echo $lname;} else {echo "Variable not set.";} ?></td>
			</tr>
			<tr>
				<td>Email Address</td>
				<td><?php if (isset($email)) {echo $email;} else {echo "Variable not set.";} ?></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><?php if (isset($password)) {echo $password;} else {echo "Variable not set.";} ?></td>
			</tr>
			<tr>
				<td>Repeat Password</td>
				<td><?php if (isset($rpassword)) {echo $rpassword;} else {echo "Variable not set.";} ?></td>
			</tr>
		</tbody>
	</table>
	<?php 
		if ($valid && $success) {
			?>
				<p>The following is the submitted SQL string: <?php echo $sql; ?></p>
			<?php
		} else {
			?>
				<p>Here is a list of reasons why your data is invalid:</p>
				<ul>
					<?php echo $err; ?>
				</ul>
			<?php
		}
	?>
</body>
</html>