<?php

class LeadsController extends AppController{

	public $name = 'Leads';
	public $viewClass ;

	public $authenticated = false;

	public function beforeFilter(){		
		
		// Check if authenticated
		if($this->request->header('Bearer-Token')){
			
			$token = $this->request->header('Bearer-Token');
			$tokenModel = ClassRegistry::init('TokenAuth.Token');
			$existingUser = $tokenModel->isTokenValid($token);
			if($existingUser){
				
				$this->authenticated = true;
			}
			else {
				
				$this->loginFailed();
			}
		}
		else {
			
			$this->loginFailed();
		}
	}

	

	// BEGIN Auth stuff
	public function loginFailed(){
		$this->viewClass = 'Json';
		$auth = new stdClass();
		$auth->unauthenticated = true;
		$auth->root_login_url = $this->getRootLoginUrl();

		$this->set(compact('auth'));
		$this->set('_serialize', array('auth'));

	}
	// END Auth stuff


	public function getRootLoginUrl(){
		$base = Router::url('/', true);
		return $base . 'token_auth/tokens/root';
	}


	/// BEGIN JSON

	public function index(){
		if($this->authenticated){
			$this->viewClass = 'Json';
			$leads = $this->Lead->find('all');
			$this->set(compact('leads'));
			$this->set('_serialize', array('leads'));
		}
	}

	// END JSON

}