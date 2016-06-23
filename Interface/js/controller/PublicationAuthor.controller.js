app.controller("PublicationAuthorcontroller",function($scope,$http,$location){

	$http.get("./php/selectPublicationAuthor.php")
	    .then(function (response) {$scope.names = response.data.records;});

	$scope.insertdata = function() {
		$http.post("./php/insertPublicationAuthor.php",{'sno':$scope.sno,'name':$scope.name,'course':$scope.course})
		.success(function(data,status,headers,config){
			console.log("Inserted Successfully!");
		});
	}
	//update data
	$scope.updatedata = function() {
		$http.post("./php/updatePublicationAuthor.php",{'sno':$scope.sno,'name':$scope.name,'course':$scope.course})
		.success(function(data,status,headers,config){
			console.log("updated Successfully!");
		});
	}
	//delete data
	$scope.deletedata = function() {
		$http.post("./php/deletePublicationAuthor.php",{'sno':$scope.sno})
		.success(function(data,status,headers,config){
			console.log("deleted Successfully!");
		});

		$scope.navigateToPage = function(page) {
			$scope.$apply(function() {
		        $location.path('/StaffDisp');
		        console.log($location.path());
		      });
		}
	}
});
