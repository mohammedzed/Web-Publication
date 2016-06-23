
<!DOCTYPE html>
<html>
<style>
table, th, td {
  border: 1px solid grey;
  border-collapse: collapse;
  padding: 5px;
}
table tr:nth-child(odd) {
  background-color: #f1f1f1;
}
table tr:nth-child(even) {
  background-color: #ffffff;
}
</style>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<body>

<div ng-app="myApp" ng-controller="Publishers.controller">

<table>
  <tr ng-repeat="x in names">
    <td>{{ x.publisher_id }}</td>
    <td>{{ x.name }}</td>
    <td>{{ x.acronym }}</td>
    <td>{{ x.field }}</td>
    <td>{{ x.category }}</td>
    <td>{{ x.type }}</td>
  </tr>
</table>

</div>

<script>
var app = angular.module('myApp', []);
app.controller('Publishers.controller', function($scope, $http) {
    $http.get("selectPublishers.php")
    .then(function (response) {$scope.names = response.data.records;});
});
</script>

</body>
</html>
