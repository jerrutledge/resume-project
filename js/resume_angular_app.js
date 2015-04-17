var app = angular.module("ResumeGenerator", [ ]);

app.controller("skillsController", ['$scope', function($scope) {
	$scope.skills = [
		{"name": "Painting", "active": false},
		{"name": "Archiving", "active": false},
		{"name": "Using Glue", "active": false}
	];
}]);