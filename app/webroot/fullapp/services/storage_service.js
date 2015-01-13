var storageServiceModule = angular.module('storageServiceModule', []);

storageServiceModule.factory('StorageService', [
	function(){

		var set = function(key, value){
			localStorage[key] = value;
		};

		var get = function(key){
			return localStorage[key];
		};

		return {
			get: get,
			set: set
		};
	}

	]);