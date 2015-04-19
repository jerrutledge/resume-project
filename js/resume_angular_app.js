var app = angular.module("ResumeGenerator", [ "ui.sortable" ]);

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

	// function for deleting skills
	$scope.editSkill = function (index) {
		$scope.newSkillText = $scope.skills[index].name;
		console.log($scope.skills[index].name);
		$scope.skills.splice(index, 1);
		$('input[ng-model="newSkillText"]').focus();
	}

	// allow skill sorting
	$scope.skillSortable = {
		containment: "parent",
		cursor: "move",
		tolerance: "pointer"
	}
}]);
