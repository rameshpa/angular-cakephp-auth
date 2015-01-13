var layoutsControllerModule = angular.module('layoutsControllerModule', []);

layoutsControllerModule.controller('LayoutsController', [
		'LayoutsService', function(LayoutsService){
			this.title = LayoutsService.getTitle();
		}
	]);