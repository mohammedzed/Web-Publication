
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

<div ng-app="myApp" ng-controller="Publications.controller">

<table>
  <tr ng-repeat="x in names">
    <td>{{ x.publication_id }}</td>
    <td>{{ x.title }}</td>
    <td>{{ x.group }}</td>
    <td>{{ x.joint_groups }}</td>
    <td>{{ x.year }}</td>
    <td>{{ x.publisher_id }}</td>
    <td>{{ x.citation_count }}</td>
    <td>{{ x.pages_count }}</td>
    <td>{{ x.link }}</td>
    <td>{{ x.status }}</td>
  </tr>
</table>

</div>

<script>
var app = angular.module('myApp', []);
app.controller('Publications.controller', function($scope, $http) {
    $http.get("selectPublications.php")
    .then(function (response) {$scope.names = response.data.records;});
});
</script>

</body>
</html>
