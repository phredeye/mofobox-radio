<div class="tracks form">
<?php echo $this->Form->create('Track');?>
	<fieldset>
 		<legend><?php __('Edit Track'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('track_number');
		echo $this->Form->input('title');
		echo $this->Form->input('artist_id');
		echo $this->Form->input('album_id');
		echo $this->Form->input('genre');
		echo $this->Form->input('year');
		echo $this->Form->input('duration');
		echo $this->Form->input('filename');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Track.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Track.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tracks', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Artists', true), array('controller' => 'artists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Artist', true), array('controller' => 'artists', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Albums', true), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album', true), array('controller' => 'albums', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Playlists', true), array('controller' => 'playlists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Playlist', true), array('controller' => 'playlists', 'action' => 'add')); ?> </li>
	</ul>
</div>