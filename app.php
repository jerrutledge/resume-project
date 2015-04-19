<?php if (!isset($_COOKIE["user"])) {
	include "error.php";
	exit();
}

$title = "App";
include "html_header.php";

?>

	<section class="container">
		<h1>{{"Hello, Angular!"}}</h1>
		<div class="row" ng-controller="skillsController">
			<div class="col-md-8 col-sm-10">
				<div class="paper">
					<h1>Resume</h1>
					<p>Hi I'm a person called George. Thanks for asking!</p>
					<h3>Skills</h3>
					<ul>
						<li ng-repeat="skill in skills" ng-show="skill.active">{{ skill.name }}</li>
					</ul>
				</div>
			</div>
			<div class="col-md-4 col-sm-2">
				<h2>Edit Skills Section</h2>
				<form role="form">
					<div class="checkbox" ng-repeat="skill in skills">
						<label>
							<input type="checkbox" ng-model="skill.active">{{ skill.name }}
						</label>
					</div>
				</form>
				<form role="form" class="form-inline" ng-submit="addSkill()">
					<div class="form-group">
						<label for="skillInput"></label>
						<input type="text" placeholder="Add Skill" ng-model="newSkillText" class="form-control" id="skillInput">
					</div>
					<button type="submit" class="btn btn-default">Add</button>
				</form>
			</div>
		</div>
	</section>

	<script>	
		var navigation = responsiveNav(".nav-collapse", {
			customToggle: "#toggle"
		});
	</script>
</body>
</html>