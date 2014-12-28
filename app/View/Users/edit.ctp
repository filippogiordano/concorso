<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Modifica Password'); ?></legend>
	<?php
		echo "<h3>Utente: " . $usernom ."</h3>";
		//echo $this->Form->input('id',array('disabled'=>'disabled'));
		//echo $this->Form->input('username',array('disabled'=>'disabled'));
		echo $this->Form->input('password', array('label'=>'Nuova password','value'=>''));
		echo $this->Form->input('controllo',array('type'=>'password','div'=>array(
        'class' => 'password required'),'label'=>'Conferma la password','required'=>'required'));
		//echo $this->Form->input('role',array('disabled'=>'disabled'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>