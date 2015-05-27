<?php

// get data from request header
$headers = apache_request_headers();
$session_id = $headers['Authorization'];

// connect to db - use $con
include 'connect.php';

/* ================== DATABASE ACCESS ================== */
// get $userID from $session_id
include 'session_to_user.php';

if ($userID != "") {
	// query database
	$result = mysqli_query($con,"SELECT * FROM Skills WHERE FID = '$userID';");

	// take the userID from the last session with the given session id
	echo "[";
	$first = true;
	while($row = mysqli_fetch_array($result)) {
		if (!$first) {
			echo ',';
		}
		$first = false;
		echo "{";
		echo '"name": "';
		echo $row['Contents'];
		echo '", "active": ';
		if ($row['Display']) {
			echo "true";
		} else {
			echo "false";
		}
		echo '}';
	}
	echo "]";
} else {
	echo "error with session_id: ".$session_id;
}
?>