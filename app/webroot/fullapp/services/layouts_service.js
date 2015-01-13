var layoutsServiceModule = angular.module("layoutsServiceModule", []);

layoutsServiceModule.factory('LayoutsService', [
	function(){
		var title = 'uHance Mobile application development, website development, web development';
		
		var setTitle = function(titleParam){
			this.title = titleParam;
		};

		var getTitle = function(){
			return this.title;
		};

		return {
			setTitle: setTitle,
			getTitle: getTitle
		};
	}
]);