var httpServiceModule = angular.module('httpServiceModule', []);

httpServiceModule.factory('HttpService', ['$http', 'AuthService', 'StorageService',
	function($http, AuthService, StorageService){

		var get = function(url, params, successCallback, errorCallback){

			var bearerToken = StorageService.get("bearer_token");
			if(!bearerToken){
				AuthService.handleAuthenticationFailed({auth : {unauthenticated: true} });
			}
			var req = {
					method: 'GET',
					url: url,
					headers: {
						'Bearer-Token': bearerToken
					}
				};
			
			$http(req).
				success(function(data) {
							AuthService.handleAuthenticationFailed(data);
				        	successCallback(data);
						}).
				error(function(error){
					errorCallback(error);
				});
			
		};

		var post = function(url, params, successCallback, errorCallback){

			var bearerToken = StorageService.get("bearer_token");
			var req = {
					method: 'POST',
					url: url,
					headers: {
						'Bearer-Token': bearerToken
					},
					data: params
				};
			

			$http(req).
				success(function(data) {
							AuthService.handleAuthenticationFailed(data);
				        	successCallback(data);
						}).
				error(function(error){
					errorCallback(error);
				});
		};

		return {
			get: get,
			post: post
		};
	}

]);