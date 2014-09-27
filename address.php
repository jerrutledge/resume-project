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
	<ul>
		<?php while  ?>
	</ul>
</body>
</html>