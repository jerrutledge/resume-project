<?php if (!isset($_COOKIE["user"])) {
	echo "ohno";
	include "error.php";
	exit();
} ?>

<html>
<head>
	<title>Resume Builder</title>
</head>
<body>
<h1>Resume Builder</h1>
<p>Welcome, <?php echo $_COOKIE["user"] ?>. Here is a list of Functions:</p>
<ul>
	<li><a href="address.php">Add / Edit / Delete Address</a></li>
	<li>Add / Edit / Delete Skill</li>
	<li>Add / Edit / Delete Employment</li>
</ul>
<p><a href="logout.php">Log out</a>.</p>
</body>
</html>