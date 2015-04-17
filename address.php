<html>
<head>
	<title>Edit Addresses</title>
</head>
<body>
	<?php 
	// Create connection
	$con=mysqli_connect("localhost","root","root","resume");
	$connection = true;

	// Check connection
	if (mysqli_connect_errno()) { 
	?>
		<p class="errortitle">Failed to connect to MySQL Database. </p>
		<p class="small">Error info: <?php echo mysqli_connect_error(); ?></p>
	<?php
		$connection = false;
	}
?>
<h1>List of Addresses: </h1>
	<ul>
		<li>Create a list of Addresses, first</li>
		<li>Create Table</li>
	</ul>
</body>
</html>