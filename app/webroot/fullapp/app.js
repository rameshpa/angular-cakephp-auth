

var uhanceAppModule = angular.module('uhanceAppModule', [
	'ngRoute',

	'leadsControllerModule',
	'layoutsControllerModule',
	'authControllerModule',

	'layoutsServiceModule',
	'leadsServiceModule',
	'configsServiceModule',
	'authServiceModule',
	'storageServiceModule',
	'httpServiceModule'
	]);


//Example route
// URL: http://server.com/index.html#/Chapter/1/Section/2?search=moby
// Route: /Chapter/:chapterId/Section/:sectionId
//
// Then
//$routeParams ==> {chapterId:'1', sectionId:'2', search:'moby'}

uhanceAppModule.config(['$routeProvider', '$httpProvider',
	function($routeProvider, $httpProvider){
		$routeProvider.
			when('/auth/bearer', {
				templateUrl: 'fullapp/views/auth/receive_bearer_token.html',
				controller: 'AuthBearerController'
			}).
			when('/leads/all', {
				templateUrl: 'fullapp/views/leads/all.html',
				controller: 'LeadsAllController'
			}).
			otherwise({
					redirectTo: '/leads/all'
			});


	}
]);