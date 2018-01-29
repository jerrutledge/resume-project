<?php 
// input: $session_id
// output: $userID

// default $userID value
$userID = "";

if (isset($session_id)) {
	// query database
	$result = mysqli_query($con,"SELECT * FROM Sessions WHERE SessionKey = '$session_id';");

	// take the userID from the last session with the given session id
	while($row = mysqli_fetch_array($result)) {
		$userID = $row['FID'];
	}
}
?>