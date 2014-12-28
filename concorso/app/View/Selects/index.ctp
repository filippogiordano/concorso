<div class="select view">
<h2><?php echo __('Scegli la materia'); ?></h2>
	<h3><?php echo __('Materie'); ?></h3>
	<ul>
		<?php foreach($choices as $key=>$choice):?>
			<li><?php echo $this->Html->link($choice,array('action'=>'initialize',$choice)); ?></li>
		<?php endforeach;?>
	</ul>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Cambio password'), array('controller'=>'users',
				'action' => 'edit','admin'=>0)); ?></li>
	</ul>
</div>
