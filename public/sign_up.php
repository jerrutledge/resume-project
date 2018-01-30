<?php
$title = "Sign Up";
include "private/html_header.php";
?>
	<section class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Sign Up For the Service</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-sm-6">
				<form action="sign_up_result.php" class="login" method="post" role="form" onsubmit="return onsignup()">
					<div class="form-group">
						<label for="fname">First Name</label>
						<input type="text" class="form-control" id="fname" name="fname">
					</div>
					<div class="form-group">
						<label for="lname">Last Name</label>
						<input type="text" class="form-control" id="lname" name="lname">
					</div>
					<div class="form-group">
						<label for="email">Email Address</label>
						<input type="email" class="form-control" id="email" name="email">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" name="password">
					</div>
					<div class="form-group">
						<label for="rpassword">Repeat Password</label>
						<input type="password" class="form-control" id="rpassword" name="rpassword">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-default">Submit</button>
					</div>
				</form>
			</div>
			<div class="col-md-8 col-sm-6">
				<p>Already have an account? <a href="login.html">Sign in</a> here.</p>
			</div>
		</div>
		<script>
		var check = function(fid, check, flag) {
			flag = (typeof flag !== 'undefined') ? flag : false;
			var field = $(fid).val();
			var reg = check;
			if (field.search(reg) == -1) {
				return flag;
			} else {
				return !flag;
			}
		}
		var onsignup = function() {
			var regex = /^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*$/;
			var noop = check("form#signup #email", regex);
			return noop;
		}
		</script>
	</section>
<?php
include "private/footer.php";
?>