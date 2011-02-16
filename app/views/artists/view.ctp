<div class="artists view">
<h2><?php  __('Artist');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $artist['Artist']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $artist['Artist']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Comment'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $artist['Artist']['comment']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $artist['Artist']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $artist['Artist']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Artist', true), array('action' => 'edit', $artist['Artist']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Artist', true), array('action' => 'delete', $artist['Artist']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $artist['Artist']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Artists', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Artist', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tracks', true), array('controller' => 'tracks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Track', true), array('controller' => 'tracks', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Tracks');?></h3>
	<?php if (!empty($artist['Track'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Track Number'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('Artist Id'); ?></th>
		<th><?php __('Album Id'); ?></th>
		<th><?php __('Genre'); ?></th>
		<th><?php __('Year'); ?></th>
		<th><?php __('Duration'); ?></th>
		<th><?php __('Filename'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($artist['Track'] as $track):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $track['id'];?></td>
			<td><?php echo $track['track_number'];?></td>
			<td><?php echo $track['title'];?></td>
			<td><?php echo $track['artist_id'];?></td>
			<td><?php echo $track['album_id'];?></td>
			<td><?php echo $track['genre'];?></td>
			<td><?php echo $track['year'];?></td>
			<td><?php echo $track['duration'];?></td>
			<td><?php echo $track['filename'];?></td>
			<td><?php echo $track['created'];?></td>
			<td><?php echo $track['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'tracks', 'action' => 'view', $track['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'tracks', 'action' => 'edit', $track['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'tracks', 'action' => 'delete', $track['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $track['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Track', true), array('controller' => 'tracks', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
