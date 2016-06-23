app.controller("crud.controllerPublications",function($scope,$http,$location){

	$http.get("./php/selectPublications.php")
	    .then(function (response) {$scope.names = response.data.records;});

			$scope.insertdata = function() {
				$http.post("./php/insertPublications.php",{
				'publication_id':$scope.publication_id,
				'title':$scope.title,
				'group':$scope.group,
				'joint_groups':$scope.joint_groups,
				'year':$scope.year,
				'publisher_id':$scope.publisher_id,
				'citation_count':$scope.citation_count,
				'pages_count':$scope.pages_count,
				'link':$scope.link,
				'status':$scope.status})
				.success(function(data,status,headers,config){
					console.log("Inserted Successfully!");
				});
	}
	//update data
	$scope.updatedata = function() {
		$http.post("./php/updatePublications.php",{
		'publication_id':$scope.publication_id,
		'title':$scope.title,
		'group':$scope.group,
		'joint_groups':$scope.joint_groups,
		'year':$scope.year,
		'publisher_id':$scope.publisher_id,
		'citation_count':$scope.citation_count,
		'pages_count':$scope.pages_count,
		'link':$scope.link,
		'status':$scope.status})
		.success(function(data,status,headers,config){
			console.log("updated Successfully!");
		});
	}
	//delete data
	$scope.deletedata = function() {
		$http.post("./php/deletePublications.php",{'publication_id':$scope.publication_id})
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
