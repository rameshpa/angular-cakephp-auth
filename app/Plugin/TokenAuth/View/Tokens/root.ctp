<?php $this->set('title', 'uhance.com CakePHP Angular Authentication code'); ?>
	<h2>Login or Register 
	</h2>
	<br/><br/>
			<?php echo $this->Html->link(__('Register',false),
				array('controller' => 'tokens', 'action' => 'register', '?' => $query), array('class' => "btn btn-default") ) ;
			?> 
			<br/><br/><br/>
			<?php echo $this->Html->link(__('Log in',false),
				array('controller' => 'tokens', 'action' => 'login', '?' => $query), array('class' => "btn btn-default") ) ;
			?> 
			<br/><br/><br/>
	
