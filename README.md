
uhance.com

MIT License

Author: Ramesh

This is a CakePHP plugin and an Angular JS application that implements authentication via tokens for angular apps that get JSON from CakePHP

While this code is written for CakePHP, you may use the same angular code for other server frameworks as well

Main concepts

	Angular app sends JSON requests to CakePHP server, 	On server side, the Cake Controller that responds to all JSON requests must verify each Http request for its token and verify the token exists in the DB.
	
	If no token in the http requests redirects to login or register page. On successful login or registration, angular gets token which it stores in local storage and then uses for all future http requests

	Angular uses a wrapper http service that incorporates the tokens in the http headers and also checks for unauthenticated requsts

	CakePHP code is written as a plugin


How to Use

1. Create a MySQL DB with two tables (leads <email> and tokens<email, password, token, type, token_expiry_date>) and change database.php for your configuration

2. Change the angular config service file for your app paths (webroot/fullapp/services/configs_service.js)

3. In webroot/fullapp/views/layouts/index1.html, change the base 

4. In the browser Go to http://localhost/AngularCakePHPAuth/fullapp/views/layouts/index1.html#/leads/all
