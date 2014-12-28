<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
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
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Refuses'); ?></h3>
	<?php //debug($filtrefuses); 
	if (!empty($user['Refus'])):
				//$type['Refus'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Kg'); ?></th>
		<th><?php echo __('Costcenter Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Note'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php 
	//$user = $this->Session->read ( 'Auth.User' );
	foreach ($user['Refus'] as $refus)://$type['Refus'] as $refus): ?>
		<tr>
			<td><?php echo $refus['id']; ?></td>
			<td><?php echo $refus['kg']; ?></td>
			<td><?php echo $refus['costcenter_id']; ?></td>
			<td><?php $date=new DateTime($refus['created']);
				echo $date->format('d-m-Y H:i:s');
				//echo $refus['created']; ?></td>
			<td><?php $date=new DateTime($refus['modified']);
				echo $date->format('d-m-Y H:i:s'); 
				//echo $refus['modified']; ?></td>
			<td><?php echo $user['User']['nominativo']; ?></td>
			<td><?php echo $refus['note']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'refuses', 'action' => 'view', $refus['id'], 'admin'=>0)); ?>
				<?php //echo $this->Html->link(__('Edit'), array('controller' => 'refuses', 'action' => 'edit', $refus['id'])); ?>
				<?php //echo $this->Form->postLink(__('Delete'), array('controller' => 'refuses', 'action' => 'delete', $refus['id']), array(), __('Are you sure you want to delete # %s?', $refus['id'])); ?>
			</td>
		</tr>
		<?php //endif;?>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>