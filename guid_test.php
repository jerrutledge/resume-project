

<html>
<head>
	<title>GUID and sha256 test</title>
</head>
<body>
	<p><?php echo "hello" ?></p>
<?php
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
	$password = $_POST['password'];
?>
	<p>It is I, Jimbles</p>
	<p><?php echo getGUID(); ?></p>
	<p>Password: <?php echo $password; ?></p>
	<p>Hashed password: <?php echo hash('sha256', $password); ?></p>
	<form action="guid_test.php" method="post">
		<label for="password">Password: </label>
		<input type="type" id="password" name="password">
		<input type="submit">
	</form>
</body>
</html>
