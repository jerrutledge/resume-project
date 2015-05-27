<?php 
// check if user is logged in
if (!isset($_COOKIE["user"])) {
	$error = '<p>You have been logged out. Please <a href="login.html">log in</a> again.</p>';
	include "error.php";
	exit();
}

$title = "App";
include "html_header.php";

?>

<!--=================================== APP.PHP ===================================-->

<section class="container">
	<h1>{{"Hello, Angular!"}}</h1>
	<?php echo '<div class="row" ng-controller="skillsController" ng-init="init(\''.$_COOKIE["user"].'\')">'; ?>

		<!-- Resume paper -->
		<div class="col-md-8 col-sm-10">
			<div class="paper">
				<h1>Resume</h1>
				<p>Hi I'm a person called George. Thanks for asking!</p>
				<h3>Skills</h3>
				<ul>
					<li ng-repeat="skill in skills" ng-show="skill.active">{{ skill.name }}</li>
				</ul>
				<h3>Server Response</h3>
				{{ serverResponse }}
			</div>
		</div>

		<!-- Side bar -->
		<div class="col-md-4 col-sm-2">

			<!-- Skills -->
			<h2>Edit Skills Section</h2>
			<div ui-sortable="skillSortable" ng-model="skills">
				<div class="checkbox" ng-repeat="skill in skills">
					<a class="edit-link pull-right" ng-click="editSkill($index)">Edit</a>
					<label>
						<input type="checkbox" ng-model="skill.active">
						{{ skill.name }}
					</label>
				</div>
			</div>
			<form class="form-inline" ng-submit="addSkill()">
				<div class="input-group">
					<input type="text" class="form-control" ng-model="newSkillText" placeholder="Add Skill">
					<span class="input-group-btn">
						<button class="btn btn-default" type="submit">Add</button>
					</span>
				</div>
			</form>
		</div>
	</div>
</section>

<?php 
include "footer.php";
?>