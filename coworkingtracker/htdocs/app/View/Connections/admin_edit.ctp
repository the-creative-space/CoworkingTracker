<div class="connections form">
<?php echo $this->Form->create('Connection'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Connection'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('device_id');
		echo $this->Form->input('ip');
		echo $this->Form->input('start_time');
		echo $this->Form->input('end_time');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Connection.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Connection.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Connections'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Devices'), array('controller' => 'devices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Device'), array('controller' => 'devices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Activities'), array('controller' => 'activities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Activity'), array('controller' => 'activities', 'action' => 'add')); ?> </li>
	</ul>
</div>
