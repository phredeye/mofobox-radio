	<div class="grid_16">
		<div class="header corner">
			<em>Artist:</em>
			<br/>
			<h2><?php echo $artist["Artist"]["name"] ?></h2>
			<div style="float: right; clear:left;">
			[<?php 
			echo $this->Html->link("Edit", array(
				"controller" => "artists",
				"action" => "edit",
				$artist["Artist"]["id"]
			));
			?>]
			</div>
			<div class="clear"></div>			
		</div>

	</div>
	<div class="clear"></div>
	
	<div class="grid_10">
		<?php echo $this->Theme->boxTop("About the artist"); ?>
		<?php if(empty($artist["Artist"]["comment"])): ?>
			<div style="text-align: center;padding:30px 0px;">There is no information about this artist</div>
		<?php else: 		
				echo $artist["Artist"]["comment"]; 
			endif;
		?>
		<?php echo $this->Theme->boxEnd(); ?>
	</div>
	<div class="grid_6">
		<?php echo $this->Theme->boxTop("Meta"); ?>
		<dl><?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $artist['Artist']['id']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Added'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $artist['Artist']['created']; ?>
				&nbsp;
			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Last Edit'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $artist['Artist']['modified']; ?>
				&nbsp;
			</dd>
		</dl>
		<?php echo $this->Theme->boxEnd(); ?>
	</div>
	<div class="clear"></div>
	
	<div class="grid_16">
		<div class="header corner">
			<h3>Albums</h3>
		</div>
	</div>
	<div class="clear"></div>
	
	<?php foreach($albums as $album): ?>
	<div style="margin-bottom:20px;">
		<div class="grid_6">
			<div class="large_cover">
			<?php echo $this->Theme->boxTop($album["Album"]["title"]) ?>
			<?php
			 $img = "llama.png";
			 $alt = "Sorry, there is no album art for this artist. So have a llama.";
	
			 if(isset($album["Album"]["large_image"])) {
				$img = $album["Album"]["large_image"];
				$alt = $album["Album"]["title"];
			 }
			 echo $this->Html->image($img, array("alt" => $alt, "title" => $alt)); 
			?>
			<?php echo $this->Theme->boxEnd(); ?>
			</div>
		</div>
		<div class="grid_10">
			<?php echo $this->Theme->boxTop("Tracks"); ?>
			<table border="0" cellspacing="5" cellpadding="5">
				<tr>
					<th>Title</th>
					<th>Length</th>
					<th class="actions">&nbsp;</th>
				</tr>
				<?php foreach($album["Tracks"] as $track):  ?>
				<tr>
					<td><?php echo $track["Track"]["title"] ?></td>
					<td><?php echo $track["Track"]["duration"] ?></td>
					<td class="actions">
						<?php 
							echo $this->Html->link("Request", 
								array(
									"controller" => "playlist",
									"action" => "enqueue",
									$track["Track"]["id"]
									),
								array(
									"class" => "request-link"
									)
								); 
						?>
						&nbsp;|&nbsp;
						<?php
						echo $this->Html->link("View", array(
							"controller"=> "tracks",
							"action" => "view",
							$track["Track"]["id"]
						));
						?>
					</td>
				</tr>
				<?php endforeach; ?>
			</table>
			<?php echo $this->Theme->boxEnd(); ?>
		</div>
		<div class="clear"></div>
	</div>
	<?php endforeach; ?>
	
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		
		$(".request-link").click(function(event) {
			
			event.stopPropagation();
			
			var url = $(this).attr("href");
			
			$.getJSON(url, function(response) {
				console.log(response["errors"]);
				
				if(response.success) {
					for(i in response.messages) {
						console.log("Message:" + response.messages[i]);
						$.jGrowl(response.messages[i], {header: "Success", theme: "message"});
					}
				} else {
					for(i in response.errors) {
						console.log("Error: " + response.errors[i]);
						$.jGrowl(response.errors[i], { header: "Error!", theme: "error"});
					}
				}
			});
			
			return false;
		
		});
	});
</script>
	
