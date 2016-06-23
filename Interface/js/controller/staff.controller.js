app.controller("staffcontroller",function($scope,$http,$location){

	$http.get("./php/select.php")
			.then(function (response) {$scope.names = response.data.records;});

			$scope.insertdata = function() {
				$http.post("./php/insert.php",{'qfid':$scope.qfid,'name':$scope.name,'publishing_names':$scope.publishing_names,
				'qf_email':$scope.qf_email,'other_emails':$scope.other_emails,'group':$scope.group,'nationality':$scope.nationality,
				'start_date':$scope.start_date,'end_date':$scope.end_date,'citation_count':$scope.citation_count,'h_index':$scope.h_index,
				'research_title':$scope.research_title,'api_handle':$scope.api_handle,'personal_webpage':$scope.personal_webpage,
				'is_academic':$scope.is_academic,'experience':$scope.experience})
				.success(function(data,status,headers,config){
					console.log("Inserted Successfully!");
				});
	}
	//update data
	//update data
	$scope.updatedata = function() {
		$http.post("./php/update.php",{'qfid':$scope.qfid,'name':$scope.name,'publishing_names':$scope.publishing_names,
		'qf_email':$scope.qf_email,'other_emails':$scope.other_emails,'group':$scope.group,'nationality':$scope.nationality,
		'start_date':$scope.start_date,'end_date':$scope.end_date,'citation_count':$scope.citation_count,'h_index':$scope.h_index,
		'research_title':$scope.research_title,'api_handle':$scope.api_handle,'personal_webpage':$scope.personal_webpage,
		'is_academic':$scope.is_academic,'experience':$scope.experience})
		.success(function(data,status,headers,config){
			console.log("updated Successfully!");
		});
	}
	//delete data
	$scope.deletedata = function() {
		$http.post("./php/delete.php",{'inst_id':$scope.inst_id})
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
