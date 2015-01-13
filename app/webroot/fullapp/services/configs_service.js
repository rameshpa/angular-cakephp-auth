var configServiceModule = angular.module('configsServiceModule', []);

configServiceModule.factory('ConfigsService', [function(){
	return {
		baseUrl: "http://localhost/AngularCakePHPAuth/",
		baseUrlForAngular: "http://localhost/AngularCakePHPAuth/fullapp/views/layouts/index1.html#/",
		baseUrlForServerFramework: "http://localhost/AngularCakePHPAuth/",
		urlForBearerTokenReceiving: "http://localhost/AngularCakePHPAuth/fullapp/views/layouts/index1.html#/auth/bearer"
	};
}]);