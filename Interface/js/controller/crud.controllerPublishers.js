app.controller("crud.controllerPublishers",function($scope,$http,$location){

	$http.get("./php/selectPublishers.php")
	    .then(function (response) {$scope.names = response.data.records;});

			$scope.insertdata = function() {
				$http.post("./php/insertPublishers.php",{
				'publisher_id':$scope.publisher_id,
				'name':$scope.name,
				'acronym':$scope.acronym,
				'field':$scope.field,
				'category':$scope.category,
				'type':$scope.type})
				.success(function(data,status,headers,config){
					console.log("Inserted Successfully!");
				});
	}
	//update data
	$scope.updatedata = function() {
		$http.post("./php/updatePublishers.php",{
		'publisher_id':$scope.publisher_id,
		'name':$scope.name,
		'acronym':$scope.acronym,
		'field':$scope.field,
		'category':$scope.category,
		'type':$scope.type})
		.success(function(data,status,headers,config){
			console.log("updated Successfully!");
		});
	}
	//delete data
	$scope.deletedata = function() {
		$http.post("./php/deletePublishers.php",{'publisher_id':$scope.publisher_id})
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
