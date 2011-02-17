<div class="users view">
<h2><?php  __('User');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Username'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['username']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Password'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['password']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['email']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Role'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['role']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User', true), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete User', true), array('action' => 'delete', $user['User']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Artists', true), array('controller' => 'artists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Artist', true), array('controller' => 'artists', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Playlists', true), array('controller' => 'playlists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Playlist', true), array('controller' => 'playlists', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Artists');?></h3>
	<?php if (!empty($user['Artist'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Genre'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Comment'); ?></th>
		<th><?php __('Begin Date'); ?></th>
		<th><?php __('End Date'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Artist'] as $artist):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $artist['id'];?></td>
			<td><?php echo $artist['user_id'];?></td>
			<td><?php echo $artist['genre'];?></td>
			<td><?php echo $artist['name'];?></td>
			<td><?php echo $artist['comment'];?></td>
			<td><?php echo $artist['begin_date'];?></td>
			<td><?php echo $artist['end_date'];?></td>
			<td><?php echo $artist['created'];?></td>
			<td><?php echo $artist['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'artists', 'action' => 'view', $artist['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'artists', 'action' => 'edit', $artist['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'artists', 'action' => 'delete', $artist['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $artist['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Artist', true), array('controller' => 'artists', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Playlists');?></h3>
	<?php if (!empty($user['Playlist'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Track Id'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Played'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Playlist'] as $playlist):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $playlist['id'];?></td>
			<td><?php echo $playlist['track_id'];?></td>
			<td><?php echo $playlist['user_id'];?></td>
			<td><?php echo $playlist['played'];?></td>
			<td><?php echo $playlist['created'];?></td>
			<td><?php echo $playlist['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'playlists', 'action' => 'view', $playlist['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'playlists', 'action' => 'edit', $playlist['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'playlists', 'action' => 'delete', $playlist['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $playlist['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Playlist', true), array('controller' => 'playlists', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
