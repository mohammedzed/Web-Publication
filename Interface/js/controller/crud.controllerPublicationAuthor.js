app.controller("crudcontrollerPublicationAuthor",function($scope,$http,$location){

	$http.get("./php/selectPublicationAuthor.php")
	    .then(function (response) {$scope.names = response.data.records;});

			$scope.insertdata = function() {
				$http.post("./php/insertPublicationAuthor.php",{
				'publication_author_id':$scope.publication_author_id,
				'publication_id':$scope.publication_id,
				'author_qfid':$scope.author_qfid,
				'authoring_order':$scope.authoring_order,
				'affiliation_id':$scope.affiliation_id,
				'author_name':$scope.author_name})
				.success(function(data,status,headers,config){
					console.log("Inserted Successfully!");
				});
	}
	//update data
	$scope.updatedata = function() {
		$http.post("./php/updatePublicationAuthor.php",{
		'publication_author_id':$scope.publication_author_id,
		'publication_id':$scope.publication_id,
		'author_qfid':$scope.author_qfid,
		'authoring_order':$scope.authoring_order,
		'affiliation_id':$scope.affiliation_id,
		'author_name':$scope.author_name})
		.success(function(data,status,headers,config){
			console.log("updated Successfully!");
		});
	}
	//delete data
	$scope.deletedata = function() {
		$http.post("./php/deletePublicationAuthor.php",{'publication_author_id':$scope.publication_author_id})
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
