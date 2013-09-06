<div class="connections view">
<h2><?php  echo __('Connection'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($connection['Connection']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Device'); ?></dt>
		<dd>
			<?php echo $this->Html->link($connection['Device']['type'], array('controller' => 'devices', 'action' => 'view', $connection['Device']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ip'); ?></dt>
		<dd>
			<?php echo h($connection['Connection']['ip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Time'); ?></dt>
		<dd>
			<?php echo h($connection['Connection']['start_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Time'); ?></dt>
		<dd>
			<?php echo h($connection['Connection']['end_time']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Connection'), array('action' => 'edit', $connection['Connection']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Connection'), array('action' => 'delete', $connection['Connection']['id']), null, __('Are you sure you want to delete # %s?', $connection['Connection']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Connections'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Connection'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Devices'), array('controller' => 'devices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Device'), array('controller' => 'devices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Activities'), array('controller' => 'activities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Activity'), array('controller' => 'activities', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Activities'); ?></h3>
	<?php if (!empty($connection['Activity'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Connection Id'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Timestamp'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($connection['Activity'] as $activity): ?>
		<tr>
			<td><?php echo $activity['id']; ?></td>
			<td><?php echo $activity['connection_id']; ?></td>
			<td><?php echo $activity['type']; ?></td>
			<td><?php echo $activity['timestamp']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'activities', 'action' => 'view', $activity['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'activities', 'action' => 'edit', $activity['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'activities', 'action' => 'delete', $activity['id']), null, __('Are you sure you want to delete # %s?', $activity['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Activity'), array('controller' => 'activities', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
