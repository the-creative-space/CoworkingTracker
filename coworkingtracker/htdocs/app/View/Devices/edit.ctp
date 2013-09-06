<div class="devices form" >
<?php echo $this->Form->create('Device'); ?>
	<fieldset>
		<legend><?php echo __('Claim Device with Mac: ') . $this->request->data['Device']['mac']; ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('type', array(
			'options' => array(
				'computer' => 'Computer',
				'smart phone' => 'Smart Phone',
				'tablet' => 'Tablet',
			),
			'type' => 'select',
			'label' => 'Device Type',
		));
		echo $this->Form->input('contact', array(
			'label' => 'Contact Information',
		));
		echo $this->Form->input('hostname');
		//echo $this->Form->input('mac');	
		echo $this->Form->input('Person.membership_id', array(
			'type' => 'radio', 
			'default' => 'create',
			'div' => array(
				'id' => 'membership',
			),
			'legend' => 'Select Membership',
		));
	?>
	<div class="editmembership" style="display:none" >
		<legend><?php echo __('Add Membership'); ?></legend>
	<?php
		echo $this->Form->input('Membership.type', array(
			'options' => array(
				'full time' => 'Full Time',
				'lite' => 'Lite',
				'basic' => 'Basic',
			),
			'type' => 'select',
			'label' => 'Membership Type',
		));
		echo $this->Form->input('Membership.name');
		echo $this->Form->input('Membership.address');
	?>
	</div>
	<?php
		echo $this->Form->input('person_id', array(
			'type' => 'radio', 
			'default' => 'create',
			'div' => array(
				'id' => 'people',
				'style' => 'display:none',
			),
			'legend' => 'Select Person',
		));
	?>
	<div class="editperson" style="display:none">
		<legend><?php echo __('Add Person'); ?></legend>
	<?php
		echo $this->Form->input('Person.name');
	?>
	</div>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Device.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Device.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Devices'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List People'), array('controller' => 'people', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person'), array('controller' => 'people', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Connections'), array('controller' => 'connections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Connection'), array('controller' => 'connections', 'action' => 'add')); ?> </li>
	</ul>
</div>
