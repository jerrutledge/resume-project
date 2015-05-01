<?php
// Create connection
$con=mysqli_connect("localhost","root","root","resume");
$success = true;

// Check connection
if (mysqli_connect_errno()) { 
	$error = '<p class="errortitle">Failed to connect to MySQL Database. </p><p class="small">Error info:'.mysqli_connect_error().'</p>';
	include "error.php";
	exit();
	$success = false;
}
?>