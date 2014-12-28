<div class="home index">
<h2>Benvenuti in
Concorso</h2>
<?php echo $this->Html->image ( 'home.png', array (
					'alt' => "Concorso",
					'border' => '0'));
?> 
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<?php $user = $this->Session->read ( 'Auth.User' );
		if (! empty ( $user )):?>
	<ul>
		<li><?php echo $this->Html->link(__('Riprendi ultimo quiz'), array('controller'=>'tests',
						'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Inizia nuovo quiz'), array('controller'=>'selects',
						'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Cambio password'), array('controller'=>'users',
				'action' => 'edit','admin'=>0)); ?></li>
	</ul>
	<?php endif;?>
</div>
