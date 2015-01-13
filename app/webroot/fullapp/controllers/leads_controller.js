
var leadsControllerModule = angular.module('leadsControllerModule', []);

leadsControllerModule.controller('LeadsAllController', ['LeadsService', 'AuthService',
	function(LeadsService, AuthService){
		this.leads = null;

		var that = this;
		LeadsService.findAll(
				{}, // no params
				function(data){
					that.leads = data;
				},
				function(error){
					console.log(error);
				}
			);
	}
]);
