
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

<div ng-app="myApp" ng-controller="studentcontroller">

<table>
  <tr ng-repeat="x in names">
    <td>{{ x.qfid }}</td>
    <td>{{ x.name }}</td>
    <td>{{ x.publishing_names }}</td>
    <td>{{ x.qf_email }}</td>
    <td>{{ x.other_emails }}</td>
    <td>{{ x.nationality }}</td>
    <td>{{ x.start_date }}</td>
    <td>{{ x.end_date }}</td>
    <td>{{ x.citation_count }}</td>
    <td>{{ x.h_index }}</td>
    <td>{{ x.research_title }}</td>
    <td>{{ x.api_handle }}</td>
    <td>{{ x.personal_webpage }}</td>
    <td>{{ x.is_academic }}</td>
    <td>{{ x.experience }}</td>
  </tr>
</table>

</div>

<script>
var app = angular.module('myApp', []);
app.controller('studentcontroller', function($scope, $http) {
    $http.get("select.php")
    .then(function (response) {$scope.names = response.data.records;});
});
</script>

</body>
</html>
