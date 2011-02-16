<div class="playlists form">
<?php echo $this->Form->create('Playlist');?>
	<fieldset>
 		<legend><?php __('Edit Playlist'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('track_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('played');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Playlist.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Playlist.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Playlists', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Tracks', true), array('controller' => 'tracks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Track', true), array('controller' => 'tracks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>