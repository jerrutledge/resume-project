<?php 
$title = "Error";
include "html_header.php"; 
?>
	<section class="container">
		<h1>Error</h1>
		<p>Something went wrong. Either your browser doesn't have cookies set or your session expired. </p>
		<p>Try <a href="login.html">logging in</a> again.</p>
	</section>
	<script>	
		var navigation = responsiveNav(".nav-collapse", {
			customToggle: "#toggle"
		});
	</script>
</body>
</html>