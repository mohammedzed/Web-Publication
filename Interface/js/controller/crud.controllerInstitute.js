app.controller("crudcontrollerInstitute",function($scope,$http,$location){

	$http.get("./php/selectInstitute.php")
	    .then(function (response) {$scope.names = response.data.records;});

	$scope.insertdata = function() {
		$http.post("./php/insertInstitute.php",{'inst_id':$scope.inst_id,'name':$scope.name,'acronym':$scope.acronym,'location':$scope.location})
		.success(function(data,status,headers,config){
			console.log("Inserted Successfully!");
		});
	}
	//update data
	$scope.updatedata = function() {
		$http.post("./php/updateInstitute.php",{'inst_id':$scope.inst_id,'name':$scope.name,'acronym':$scope.acronym,'location':$scope.location})
		.success(function(data,status,headers,config){
			console.log("updated Successfully!");
		});
	}
	//delete data
	$scope.deletedata = function() {
		$http.post("./php/deleteInstitute.php",{'inst_id':$scope.inst_id})
		.success(function(data,status,headers,config){
			console.log("deleted Successfully!");
		});

		$scope.navigateToPage = function(page) {
			$scope.$apply(function() {
		        $location.path('/InstituteDisp');
		        console.log($location.path());
		      });
		}
	}
});
