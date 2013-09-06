<div class="people view">
<h2><?php  echo __('Person'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($person['Person']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Membership'); ?></dt>
		<dd>
			<?php echo $this->Html->link($person['Membership']['name'], array('controller' => 'memberships', 'action' => 'view', $person['Membership']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($person['Person']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Person'), array('action' => 'edit', $person['Person']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Person'), array('action' => 'delete', $person['Person']['id']), null, __('Are you sure you want to delete # %s?', $person['Person']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List People'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Memberships'), array('controller' => 'memberships', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Membership'), array('controller' => 'memberships', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Devices'), array('controller' => 'devices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Device'), array('controller' => 'devices', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Devices'); ?></h3>
	<?php if (!empty($person['Device'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Person Id'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Contact'); ?></th>
		<th><?php echo __('Hostname'); ?></th>
		<th><?php echo __('Mac'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($person['Device'] as $device): ?>
		<tr>
			<td><?php echo $device['id']; ?></td>
			<td><?php echo $device['person_id']; ?></td>
			<td><?php echo $device['type']; ?></td>
			<td><?php echo $device['contact']; ?></td>
			<td><?php echo $device['hostname']; ?></td>
			<td><?php echo $device['mac']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'devices', 'action' => 'view', $device['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'devices', 'action' => 'edit', $device['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'devices', 'action' => 'delete', $device['id']), null, __('Are you sure you want to delete # %s?', $device['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Device'), array('controller' => 'devices', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
