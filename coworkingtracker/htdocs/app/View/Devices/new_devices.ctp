<div class="devices index">
	<h2><?php echo __('New Devices'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><span>id</span></th>
			<th><span>Mac Address</th>
			<th><span>Last Connection</th>
			<th><span>Last Disconnect</th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($newDevices as $device): ?>
	<tr>
		<td><?php echo h($device['Device']['id']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['mac']); ?>&nbsp;</td>
		<td><?php echo h($device['Connection']['start_time']); ?>&nbsp;</td>
		<td><?php echo h($device['Connection']['end_time']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $device['Device']['id'])); ?>
			<?php echo $this->Html->link(__('Claim Device'), array('action' => 'edit', $device['Device']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Device'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List People'), array('controller' => 'people', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person'), array('controller' => 'people', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Connections'), array('controller' => 'connections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Connection'), array('controller' => 'connections', 'action' => 'add')); ?> </li>
	</ul>
</div>
