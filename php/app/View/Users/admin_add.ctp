<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('nome');
		echo $this->Form->input('cognome');
		echo $this->Form->input('username', array('type' => 'email','label'=>'Nome utente (Email)'));
		//echo $this->Form->input('password');
		echo $this->Form->input('role', array('options' => array( 'user' => 'User', 'admin' => 'Admin')        ));
	?>
	</fieldset>
<?php echo $this->Form->end('Crea utente'); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
	</ul>
</div>
