var authServiceModule = angular.module('authServiceModule', []);

authServiceModule.factory('AuthService', ['ConfigsService',
	function(ConfigsService){

		var handleAuthenticationFailed = function(data){
			if(data.hasOwnProperty('auth')){
				if(data.auth.unauthenticated){
					var currentUrl = window.location.href;
					var bearerTokenReceivingUrl = ConfigsService.urlForBearerTokenReceiving;
					window.location.href = data.auth.root_login_url + 
						"?client_bearer_token_receiving_url=" + encodeURIComponent(ConfigsService.urlForBearerTokenReceiving) +
						"&client_redirect_url=" + encodeURIComponent(currentUrl) ;
				}
			}
		};

		

		return {
			handleAuthenticationFailed: handleAuthenticationFailed
			
		};
	}

	]);
