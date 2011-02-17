<div class="grid_10 prefix_3 suffix_3">
<?php echo $this->Theme->boxTop("Add User"); ?>
<?php echo $this->Form->create('User');?>
	<fieldset>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('password_confirm', array("type"=>'password'));
		echo $this->Form->input('email');
		echo $this->Form->input('role', array(
			"type"=>"select",
			"options"=>Configure::read("Mofobox.Roles"), 
			"value" => "registered"
			));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
<?php echo $this->Theme->boxEnd(); ?>
</div>
