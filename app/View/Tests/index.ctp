<div class="test view">
<h2><?php echo __('Test'); ?></h2>
	<dl>
		<dt><?php echo __('Domanda'); ?></dt>
		<dd>
			<?php echo h($domandan+1 . ' di ' . $tot); ?>
			&nbsp;
		<dt><?php echo __('Punteggio'); ?></dt>
		<dd>
			<?php echo h($points); ?>
			&nbsp;
		</dd>
		</dd>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($test['Question']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Domanda'); ?></dt>
		<dd>
			<?php echo h($test['Question']['domanda']); ?>
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
<div class="tests form">
<?php echo $this->Form->create('Question'); ?>
	<fieldset>
		<legend><?php echo __('Risposta'); ?></legend>
	<?php
		echo $this->Form->radio('risposta',array($order[0]=>'A)'.$test['Question'][$order[0]],
				$order[1]=>'B)'.$test['Question'][$order[1]],
				$order[2]=>'C)'.$test['Question'][$order[2]]),
				array('value'=>$selected));
	?>
	</fieldset>
<?php echo $this->Form->end('Conferma'); ?>
</div>
