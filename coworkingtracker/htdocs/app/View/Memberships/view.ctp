<div class="memberships view">
<h2><?php  echo __('Membership'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($membership['Membership']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($membership['Membership']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($membership['Membership']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($membership['Membership']['address']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Membership'), array('action' => 'edit', $membership['Membership']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Membership'), array('action' => 'delete', $membership['Membership']['id']), null, __('Are you sure you want to delete # %s?', $membership['Membership']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Memberships'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Membership'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List People'), array('controller' => 'people', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person'), array('controller' => 'people', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related People'); ?></h3>
	<?php if (!empty($membership['Person'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Membership Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($membership['Person'] as $person): ?>
		<tr>
			<td><?php echo $person['id']; ?></td>
			<td><?php echo $person['membership_id']; ?></td>
			<td><?php echo $person['name']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'people', 'action' => 'view', $person['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'people', 'action' => 'edit', $person['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'people', 'action' => 'delete', $person['id']), null, __('Are you sure you want to delete # %s?', $person['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Person'), array('controller' => 'people', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
