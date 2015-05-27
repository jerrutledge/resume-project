<?php

// get data from body
$requestBody = file_get_contents('php://input');
$requestParsedJSON = json_decode($requestBody);

// connect to db - use $con
include 'connect.php';

/* ================== VALIDATION ================== */
$valid = true;

// check that valid name is given
if (is_null($requestParsedJSON->{'name'}) || $requestParsedJSON->{'name'} == "") {
	$valid = false;
}

/* ================== SUBMISSION ================== */
if ($valid) {
	// get $userID from $session_id
	$session_id = $requestParsedJSON->{'session_id'};
	include 'session_to_user.php';

	// Insert new skill into database
	if ($userID != "") {
		// variables to insert
		$skillContents = $requestParsedJSON->{'name'};
		$display = 1; // display this item right away

		// new skill query
		$query = "INSERT INTO Skills (Contents, Display, FID)
			VALUES ('$skillContents', '$display', '$userID');";
		$result = mysqli_query($con, $query);
		if (!$result) {
			echo "Database write failed for query string: ".$query;
			echo "Error: ".mysql_error();
		}
	}
}

?>
<?php echo $_SERVER['REQUEST_METHOD']; ?> request recieved.

Request body: <?php echo $requestBody; ?>

Request soul: New skill named <?php echo $requestParsedJSON->{'name'} ?>
