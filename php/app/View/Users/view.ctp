<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($user['User']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cognome'); ?></dt>
		<dd>
			<?php echo h($user['User']['cognome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo h($user['User']['role']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php $date=new DateTime($user['User']['created']);
				echo h($date->format('d-m-Y H:i:s'));?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php $date=new DateTime($user['User']['modified']);
				echo h($date->format('d-m-Y H:i:s')); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Cambio password'), array('controller'=>'users',
				'action' => 'edit','admin'=>0)); ?></li>
	</ul>
</div>
