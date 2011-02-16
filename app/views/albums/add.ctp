<div class="albums form">
<?php echo $this->Form->create('Album');?>
	<fieldset>
 		<legend><?php __('Add Album'); ?></legend>
	<?php
		echo $this->Form->input('amazon_asin');
		echo $this->Form->input('amazon_detail_page_url');
		echo $this->Form->input('amazon_average_rating');
		echo $this->Form->input('small_image');
		echo $this->Form->input('medium_image');
		echo $this->Form->input('large_image');
		echo $this->Form->input('genre');
		echo $this->Form->input('title');
		echo $this->Form->input('year');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Albums', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Tracks', true), array('controller' => 'tracks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Track', true), array('controller' => 'tracks', 'action' => 'add')); ?> </li>
	</ul>
</div>