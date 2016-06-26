var app = angular.module("ResumeGenerator", [ "ui.sortable" ]);

app.controller("skillsController", ['$scope', '$http', function($scope, $http) {

	// grab cookies from php
	$scope.init = function(session_id) {
        $scope.session_id = session_id;
		// config http headers
		$http.defaults.headers.common.Authorization = $scope.session_id;

        var getSkillsBody = {
        	"session_id":($scope.session_id)
        }

        $scope.serverResponse = "Fetching data...";

		// get skills from server
		$http.get('get_skills.php').
		success(function (data, status, headers, config) {
			$scope.skills = data;
			$scope.serverResponse = "Successfully got skills from server: "+data;
		}).
		error(function (data, status, headers, config) {
			$scope.serverResponse = "FAIL: ";
		});
    }

	// Skills
	$scope.skills = [];

	// new skill
	$scope.newSkillText = "";

	// server Response text
	$scope.serverResponse = "";

	// function for adding skills
	$scope.addSkill = function () {
		if ($scope.newSkillText) {
			var newSkill = {
				"name": $scope.newSkillText,
				"active": true,
			}
			$scope.skills.push(newSkill);
			$scope.newSkillText = "";

			newSkill["session_id"] = $scope.session_id;

			// send skills to server
			$http.post('update_skill.php', newSkill).
			success(function (data, status, headers, config) {
				$scope.serverResponse = "GOT IT: "+data;
			}).
			error(function (data, status, headers, config) {
				$scope.serverResponse = "FAIL: "+status;
			});
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
