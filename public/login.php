<?php

// header
$title = "Login";
include "private/html_header.php";

?>
	<section class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Log In</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-sm-6">
				<form action="<?php echo $basepath; ?>authenticate.php" class="login" method="post" role="form">
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" name="password">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-default">Submit</button>
					</div>
				</form>
			</div>
			<div class="col-md-8 col-sm-6">
				<p>If you don't have an account, <a href="sign_up.html">sign up</a> here.</p>
			</div>
		</div>
	</section>

<?php 
include "private/footer.php";
?>