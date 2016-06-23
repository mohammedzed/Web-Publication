app.controller("maincontroller",function($scope,$http,$location){

		$scope.navigateToPage = function(page) {
			// $scope.$apply(function() {
		        $location.path(page);
		        console.log($location.path());
		      // });
		}
});
