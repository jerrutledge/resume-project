var app = angular.module("ResumeGenerator", [ ]);

app.controller("skillsController", ['$scope', function($scope) {
	// Skills
	$scope.skills = [
		{"name": "Painting", "active": false},
		{"name": "Archiving", "active": false},
		{"name": "Using Glue", "active": false}
	];

	// new skill
	$scope.newSkillText = "";

	// function for adding skills
	$scope.addSkill = function () {
		if ($scope.newSkillText) {
			var newSkill = {
				"name": $scope.newSkillText,
				"active": true,
			}
			$scope.skills.push(newSkill);
			$scope.newSkillText = "";
		}
	}
}]);
