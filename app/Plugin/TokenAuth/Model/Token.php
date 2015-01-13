<?php
App::uses('AppModel', 'Model');
App::uses('CakeTime', 'Utility');
class Token extends AppModel {
    public $name = 'Token';

	public function isTokenValid($token){
		$tokenAuth = $this->find('first', 
			array(
				'conditions' => array('Token.token' => $token)
			));

		if($tokenAuth){
			$expiryDate = $tokenAuth['Token']['token_expiry_date'];
			
			if(CakeTime::gmt($expiryDate) < CakeTime::gmt() ){
				return false;
			}
			else {
				return $tokenAuth['Token'];
			}
		}
		else {
			return false;
		}
	}    
}

?>