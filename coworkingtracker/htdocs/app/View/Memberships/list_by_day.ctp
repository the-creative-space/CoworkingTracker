<div class="people index">
	<div class="date change">
		<?php echo $this->Form->create(null, array(
			"class" => "changeDate",
			"action" => "",
		)); ?>
	<fieldset>
		<legend><?php echo __('Choose Date'); ?></legend>
		<?php
			echo $this->Form->year('year', date('Y') - 12, date('Y'), array('empty' => "YEAR", 'required' => true,));
			echo $this->Form->month('month', array('empty' => "MONTH", 'required' => true,));
			echo $this->Form->day('day', array('empty' => 'DAY', 'required' => true,));
		?>
		<?php 
			echo $this->Form->input('memberId', array(
				'type' => 'hidden',
				'value' => $memberId,
			));
		?>
	</fieldset>
		<?php echo $this->Form->end(__('Submit')); ?>
		<?php echo $this->Html->link('<Back', 'list_by_day/' . date('Y-m-d', strtotime($niceTime. ' - 1 days')) . '/' . $memberId, array('class' => 'button', 'id' => 'back-button')); ?>
		<?php echo $this->Html->link('Next>', 'list_by_day/' . date('Y-m-d', strtotime($niceTime. ' + 1 days')) . '/' . $memberId, array('class' => 'button', 'id' => 'next-button')); ?>
	</div>
	<div class="filter">
		<?php echo $this->Form->create('Membership', array(
			'class' => 'addFilter',	
			'action' => '',
		)); ?>
	<fieldset>
		<legend><?php echo __('Membership'); ?></legend>
		<?php
			echo $this->Form->input('id', array(
				'type' => 'select',
				'options' => $settings,
				'label' => false,
			));
		?>
		<?php 
			echo $this->Form->input('time', array(
				'type' => 'hidden',
				'value' => $niceTime,
			));
		?>
	</fieldset>
		<?php echo $this->Form->end(__('Submit'));?>
		<?php echo $this->Html->link('Clear', 'list_by_day/' . $niceTime . "/$", array('class' => 'button', 'id' => 'clear-button')); ?>
	</div>
	<h2><?php echo __('Connections on ') . $this->Time->format('D, M jS Y', $niceTime) . ' ' . $memberCheck; ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>	
			<th><?php echo 'Membership'; ?></th>	
			<th><?php echo 'Person'; ?></th>		
			<th><?php echo '# of devices connected'; ?></th>
			<th><?php echo 'Total connection time'; ?></th>
			<!-- <th class="actions"><?php //echo __('Actions'); ?></th> -->
	</tr>
	<?php foreach ($connections as $connection): ?>
	<tr>
		
		<td><?php echo $this->Html->link(__($connection['Membership']['name']), array('action' => 'view', $connection['Membership']['id'])); ?>&nbsp;</td>
			<?php //foreach ($connection['Person'] as $person): ?>
			<?php //if($person['Person']['membership_id'] == $membership['Membership']['id']) { ?>	
		<td><?php echo $this->Html->link(__($connection['Person']['name']), array('action' => 'view', $connection['Person']['id'])); ?>&nbsp;</td>	
		<td><?php echo h($connection[0]['DeviceCount']); ?>&nbsp;</td>
		<td><?php echo gmdate("H:i:s", $connection[0]['Seconds']); ?>&nbsp;</td>
		    <?php //} endforeach; ?>
		<!-- <td class="actions">
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $connection['Membership']['id'])); ?>
			<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $connection['Membership']['id'])); ?>
			<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $connection['Membership']['id']), null, __('Are you sure you want to delete # %s?', $connection['Membership']['id'])); ?>
		</td> -->
		
	</tr>
<?php endforeach; ?>
	</table>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Person'), array('controller' => 'people', 'action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Memberships'), array('controller' => 'memberships', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Membership'), array('controller' => 'memberships', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Devices'), array('controller' => 'devices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Device'), array('controller' => 'devices', 'action' => 'add')); ?> </li>
	</ul>
</div>
