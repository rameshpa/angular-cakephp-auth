
var leadsServiceModule = angular.module('leadsServiceModule', []);

leadsServiceModule.factory('LeadsService', [ 'ConfigsService', 'HttpService', 
	function(ConfigsService, HttpService){

		var findAll = 
			function(paramsIn, successCallback, errorCallback){
				HttpService.get(ConfigsService.baseUrl + 'leads/index',
								paramsIn,
								successCallback,
						        errorCallback
					        	);
			};

		


		return {
			findAll: findAll
		};

	}
]);