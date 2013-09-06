<div class="devices view">
<h2><?php  echo __('Device'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($device['Device']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Person'); ?></dt>
		<dd>
			<?php echo $this->Html->link($device['Person']['name'], array('controller' => 'people', 'action' => 'view', $device['Person']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($device['Device']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact'); ?></dt>
		<dd>
			<?php echo h($device['Device']['contact']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hostname'); ?></dt>
		<dd>
			<?php echo h($device['Device']['hostname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mac'); ?></dt>
		<dd>
			<?php echo h($device['Device']['mac']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Device'), array('action' => 'edit', $device['Device']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Device'), array('action' => 'delete', $device['Device']['id']), null, __('Are you sure you want to delete # %s?', $device['Device']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Devices'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Device'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List People'), array('controller' => 'people', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person'), array('controller' => 'people', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Connections'), array('controller' => 'connections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Connection'), array('controller' => 'connections', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Connections'); ?></h3>
	<?php if (!empty($device['Connection'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Device Id'); ?></th>
		<th><?php echo __('Ip'); ?></th>
		<th><?php echo __('Start Time'); ?></th>
		<th><?php echo __('End Time'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($device['Connection'] as $connection): ?>
		<tr>
			<td><?php echo $connection['id']; ?></td>
			<td><?php echo $connection['device_id']; ?></td>
			<td><?php echo $connection['ip']; ?></td>
			<td><?php echo $connection['start_time']; ?></td>
			<td><?php echo $connection['end_time']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'connections', 'action' => 'view', $connection['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'connections', 'action' => 'edit', $connection['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'connections', 'action' => 'delete', $connection['id']), null, __('Are you sure you want to delete # %s?', $connection['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Connection'), array('controller' => 'connections', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
