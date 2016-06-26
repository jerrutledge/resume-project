<?php

function getCurrentUri() {
	// TODO later compare to $_SERVER['SCRIPT_NAME'] to determin relative path
	$uri = $_SERVER['REQUEST_URI'];
	$path_array = explode("/", $uri);
	return $path_array;
}

$uri = getCurrentUri();

switch ($uri[1]) {
	case 'css':
	case 'img':
	case 'js':
	case 'node_modules':
		include implode("/", $uri);
		exit;
}

// check if user is logged in
if (!isset($_COOKIE["user"])) {
	
}
