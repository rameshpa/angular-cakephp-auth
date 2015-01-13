var authControllerModule = angular.module('authControllerModule', []);

authControllerModule.controller('AuthBearerController', ['AuthService', 'StorageService', '$routeParams',
	function(AuthService, StorageService, $routeParams){
		// Get bearer token and store in local storage
		var bearerToken = $routeParams['bearer_token'];
		var loginType = $routeParams['login_type'];
		var clientRedirectUrl = decodeURIComponent($routeParams['client_redirect_url']);

		StorageService.set('bearer_token', bearerToken);
		StorageService.set('login_type', loginType);

		window.location.href = clientRedirectUrl;
	}
]);