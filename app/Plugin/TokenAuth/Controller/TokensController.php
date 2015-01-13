<?php


App::uses('CakeTime', 'Utility');
App::uses('Security', 'Utility');


class TokensController extends AppController{


	public function beforeFilter(){
	
		$this->set('title', 'uhance.com CakePHP Angular Authentication code');
	}

	public function root(){
		$query = $this->request->query;
		$this->set(compact('query'));
	}

	public function register(){
		if (empty($this->request->data)) {
	        $queryString = '?' . http_build_query($this->request->query);
			$this->set(compact('queryString'));
	    } else {

	    	$this->request->data['Token']['password'] = Security::hash($this->request->data['Token']['password'], 'md5');

	    	$this->request->data['Token']['token'] = Security::hash($this->request->data['Token']['email'], 'md5');

	    	$this->request->data['Token']['type'] = 'application';

	    	$this->request->data['Token']['token_expiry_date'] = CakeTime::format('+365 days', '%Y-%m-%d');

	   		$this->Token->save($this->request->data);

	   		$bearerTokenReceivingUrl = urldecode($this->request->query['client_bearer_token_receiving_url']);
	   		unset($this->request->query['client_bearer_token_receiving_url']);
	   		$this->request->query['bearer_token'] = $this->request->data['Token']['token'];
	   		$this->request->query['login_type'] = 'application';

	        return $this->redirect($bearerTokenReceivingUrl . '?' . http_build_query($this->request->query));
	    }
	

	}

	public function login(){

		$loginError = false;
		if (empty($this->request->data)) {
	        $queryString = '?' . http_build_query($this->request->query);
			$this->set(compact('queryString', 'loginError'));
	    } else {
	    	$this->log( 'Request data:', 'debug');
	    	//$this->log( serialize($this->request->data), 'debug');

	    	$email = $this->request->data['Token']['email'];
	    	$password = Security::hash($this->request->data['Token']['password'], 'md5');
			$token = $this->Token->find('first', 
				array(
					'conditions' => array('and' => array(
						'Token.email' => $email, 'password' => $password
 					))));

			if($token){
				$bearerTokenReceivingUrl = urldecode($this->request->query['client_bearer_token_receiving_url']);
		   		unset($this->request->query['client_bearer_token_receiving_url']);
		   		$this->request->query['bearer_token'] = $token['Token']['token'];
		   		$this->request->query['login_type'] = 'application';

		        return $this->redirect($bearerTokenReceivingUrl . '?' . http_build_query($this->request->query));
	   		}
	   		else {
	   			$loginError = true;
	   			$queryString = '?' . http_build_query($this->request->query);
				$this->set(compact('queryString', 'loginError'));
	   		}

		}
	}
}