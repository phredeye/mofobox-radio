<div class="artists form">
<?php echo $this->Form->create('Artist');?>
	<fieldset>
 		<legend><?php __('Edit Artist'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('comment');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Artist.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Artist.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Artists', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Tracks', true), array('controller' => 'tracks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Track', true), array('controller' => 'tracks', 'action' => 'add')); ?> </li>
	</ul>
</div>