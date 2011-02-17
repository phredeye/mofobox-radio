<div class="grid_16">
	<div class="header corner">
		<em>Track Title:</em>
		<h2><?php echo $track["Track"]["title"]; ?></h2>
		<div style="float: right; clear:left;">
		[<?php 
		echo $this->Html->link("Edit", array(
			"controller" => "tracks",
			"action" => "edit",
			$track["Track"]["id"]
		));
		?>]
		</div>
		<div class="clear"></div>
	</div>
</div>
<div class="clear"></div>

<div class="grid_10">
	<?php echo $this->Theme->boxTop("Track Info") ?>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Artist'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $this->Html->link($track['Artist']['name'], array('controller' => 'artists', 'action' => 'view', $track['Artist']['id'])); ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Album'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $this->Html->link($track['Album']['title'], array('controller' => 'albums', 'action' => 'view', $track['Album']['id'])); ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Genre'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $track['Track']['genre']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Year'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $track['Track']['year']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Duration'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $track['Track']['duration']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $track['Track']['created']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $track['Track']['modified']; ?>
				&nbsp;
			</dd>
	</dl>
	<?php echo $this->Theme->boxEnd(); ?>
</div>
<div class="grid_6">
	<?php echo $this->Theme->boxTop("Cover Art") ?>
	<div class="medium_cover corner">
		<?php 
			$image = "llama.gif";
			if(!empty($track["Album"]["large_image"])) {
				$image = $track["Album"]["large_image"];
			}
			echo $this->Html->image($image); 
		?>
	</div>
	<?php echo $this->Theme->boxEnd(); ?>
</div>
