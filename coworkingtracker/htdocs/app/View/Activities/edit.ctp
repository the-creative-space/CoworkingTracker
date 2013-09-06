<div class="activities form">
<?php echo $this->Form->create('Activity'); ?>
	<fieldset>
		<legend><?php echo __('Edit Activity'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('connection_id');
		echo $this->Form->input('type');
		echo $this->Form->input('timestamp');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Activity.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Activity.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Activities'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Connections'), array('controller' => 'connections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Connection'), array('controller' => 'connections', 'action' => 'add')); ?> </li>
	</ul>
</div>
