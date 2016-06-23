
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

<div ng-app="myApp" ng-controller="PublicationAuthorcontroller">

<table>
  <tr ng-repeat="x in names">
    <td>{{ x.publication_author_id }}</td>
    <td>{{ x.publication_id }}</td>
    <td>{{ x.author_qfid }}</td>
    <td>{{ x.authoring_order }}</td>
    <td>{{ x.affiliation_id }}</td>
    <td>{{ x.author_name }}</td>
  </tr>
</table>

</div>

<script>
var app = angular.module('myApp', []);
app.controller('PublicationAuthorcontroller', function($scope, $http) {
    $http.get("selectPublicationAuthor.php")
    .then(function (response) {$scope.names = response.data.records;});
});
</script>

</body>
</html>
