<?php 
$title = "Error";
include "html_header.php"; 
?>
	<section class="container">
		<h1>Error</h1>
		<?php
if (isset($error)) {
	echo $error;
} else {
		?>
		<p>Something went wrong. Either your browser doesn't have cookies set or your session expired. </p>
		<?php
}
?>
		<p>Try <a href="login.html">logging in</a> again.</p>
	</section>
<?php

include "footer.php";

?>