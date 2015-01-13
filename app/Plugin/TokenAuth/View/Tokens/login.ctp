<?php $this->set('title', 'uhance.com CakePHP Angular Authentication code'); ?>
<div class ="container-fluid">
	<h2>Login 
	</h2>
	
	<div  style="text-align:left">		
			<?php echo $this->Form->create('Token', array( 'action' => 'login'. $queryString, 'id' => 'TokenLoginForm' ));?> 
				<fieldset>
				<?php
				echo __('Email:' . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
				echo $this->Form->input ('Token.email',array('label' => false, 'div' => false, 'value' => ''));
				echo '<br/><br/>';
				echo __('Password:&nbsp;');
				echo $this->Form->input ('Token.password',array('label' => false, 'div' => false, 'value' => ''));
				
				echo '<br/>';echo '<br/>';
				
				echo $this->Form->submit(null, array('div' => false, 'class' => 'btn btn-default'));
				?>
				</fieldset>
				<?php echo $this->Form->end();?>
				<?php if($loginError){
					?>
					<div style="color:red">Incorrect login</div>
					<?php
				} ?>
	</div>

	




</div>