var app = angular.module('myApp', ['ngRoute']);

	app.config(function($routeProvider){
		//set up routes
		$routeProvider
		.when('/', {
			templateUrl: 'html/main.html',
			controller: 'maincontroller'
		})
		.when('/CRUD', {
			templateUrl: 'html/CRUD.html',
			controller: 'crudcontroller'
		})
		.when('/StaffDisp',{
			templateUrl: 'html/StaffDisp.html',
			controller: 'staffcontroller'
		})
		.when('/CRUDInstitute', {
			templateUrl: 'html/CRUDInstitute.html',
			controller: 'crudcontrollerInstitute'
		})
		.when('/InstituteDisp',{
			templateUrl: 'html/InstituteDisp.html',
			controller: 'Institutecontroller'
		})
		.when('/CRUDPublicationAuthor', {
			templateUrl: 'html/CRUDPublicationAuthor.html',
			controller: 'crudcontrollerPublicationAuthor'
		})
		.when('/PublicationAuthorStaffDisp',{
			templateUrl: 'html/PublicationAuthorStaffDisp.html',
			controller: 'PublicationAuthorcontroller'
		})
		.when('/CRUDPublishers', {
			templateUrl: 'html/CRUDPublishers.html',
			controller: 'crud.controllerPublishers'
		})
		.when('/PublishersDisp',{
			templateUrl: 'html/PublishersDisp.html',
			controller: 'Publishers.controller'
		})
		.when('/CRUDPublications', {
			templateUrl: 'html/CRUDPublications.html',
			controller: 'crud.controllerPublications'
		})
		.when('/PublicationsDisp',{
			templateUrl: 'html/PublicationsDisp.html',
			controller: 'Publications.controller'
		})
		.otherwise({
			redirectTo: '/'
		});
	});
