INDEX
<?php

function getCurrentUri() {
	// TODO later compare to $_SERVER['SCRIPT_NAME'] to determine relative path
	$uri = $_SERVER['REQUEST_URI'];
	$path_array = explode("/", $uri);
	return $path_array;
}

$uri = getCurrentUri();
$basepath = "/";

$resource_name = implode("/", $uri);
if (strpos($resource_name, "..")) {
	$error = '<p>Please remove the ".." from your url. If you arrived here by accident, click the back button on your browser, or <a href="/login">log in again here</a>.</p>';
	include "public/error.php";
} else {
	if (empty($uri[1])) {
		include "public/login.php";
	} else if (!(include "public/".$uri[1])) {
		include "private/404.php";
	}
}


// // check if user is logged in
// if (!isset($_COOKIE["user"])) {
// 	// force reauthentication
// 	require "public/login.php";
// 	exit;
// } else {
// 	require "public/app.php";
// }
