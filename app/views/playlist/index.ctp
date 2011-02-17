<div class="playlists index">
	<h2><?php __('Playlists');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('track_id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('played');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($playlists as $playlist):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $playlist['Playlist']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($playlist['Track']['title'], array('controller' => 'tracks', 'action' => 'view', $playlist['Track']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($playlist['User']['id'], array('controller' => 'users', 'action' => 'view', $playlist['User']['id'])); ?>
		</td>
		<td><?php echo $playlist['Playlist']['played']; ?>&nbsp;</td>
		<td><?php echo $playlist['Playlist']['created']; ?>&nbsp;</td>
		<td><?php echo $playlist['Playlist']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $playlist['Playlist']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $playlist['Playlist']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $playlist['Playlist']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $playlist['Playlist']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Playlist', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tracks', true), array('controller' => 'tracks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Track', true), array('controller' => 'tracks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>