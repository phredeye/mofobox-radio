<div class="grid_16">
	<div class="header corner">
		<div class="grid_5">
			Song:
	 		<h2><?php echo $track["Track"]["title"] ?></h2>
		</div>
		<div class="grid_6">
			Artist:
			<h3><?php 
			echo $this->Html->link($track['Artist']['name'], array(
				'controller' => 'artists', 
				'action' => 'view', 
				$track['Artist']['id']
				)); 
			?></h3>			
		</div>
		<div class="grid_5">
			Album:
			<h3>	<?php 
				echo $this->Html->link($track['Album']['title'], array(
					'controller' => 'albums', 
					'action' => 'view',
					$track['Album']['id']
					)); 
				?>
			</h3>
		</div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
	
	
<div class="grid_6">
	<?php echo $this->Theme->boxTop("Track Information") ?>
		<dl>
				<dt><?php __('Genre'); ?></dt>
				<dd>
					<?php echo $track['Track']['genre']; ?>
					&nbsp;
				</dd>
				<dt><?php __('Year'); ?></dt>
				<dd>
					<?php echo $track['Track']['year']; ?>
					&nbsp;
				</dd>
				<dt><?php __('Duration'); ?></dt>
				<dd>
					<?php echo $this->SongInfo->formatDuration($track['Track']['duration']); ?>
					<span style="font-size:9px;">(<?php echo $track["Track"]["duration"] ?> seconds)</span>
					&nbsp;
				</dd>
				<dt><?php __('Added to Mofobox'); ?></dt>
				<dd>
					<?php echo $this->Time->timeAgoInWords($track['Track']['created']); ?>
					&nbsp;
				</dd>
				<dt><?php __('Last Edit'); ?></dt>
				<dd>
					<?php echo $this->Time->timeAgoInWords($track['Track']['modified']); ?>
					&nbsp;
				</dd>
		</dl>
	<?php echo $this->Theme->boxEnd(); ?>

	<?php echo $this->Theme->boxTop("Rating") ?>
		<dl>
			<dt>Current Rating</dt>
			<dd><?php echo $track["Track"]["rating"] ?> stars</dd>
			<dt>Your Rating</dt>
			<dd><span id="stars-caption"></span>&nbsp;</dd>
		</dl>
		<?php echo $this->Stars->display($this->passedArgs, $track["Track"]["id"], $track["Track"]["rating"]); ?>
		<div class="clear"></div>

	<?php echo $this->Theme->boxEnd(); ?>

	<?php echo $this->Theme->boxTop("Album Cover") ?>
	<div class="medium_cover corner">
		<?php 
			$image = "llama.png";
			if(!empty($track["Album"]["large_image"])) {
				$image = $track["Album"]["large_image"];
			}
			echo $this->Html->image($image); 
		?>
	</div>
	<?php echo $this->Theme->boxEnd(); ?>
</div>
<div class="grid_10">
	<?php echo $this->Theme->boxTop("Comments") ?>
	
	<?php echo $this->Theme->boxEnd(); ?>
</div>
<div class="clear"></div>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		
		$('#stars-wrapper').stars({
			cancelShow: false,
			inputType: "select",
			captionEl: $("#stars-caption"),
			callback: function(ui, type, value) {
				var rating = $("input[name*='rating']").val();
				var url = ui.$form.attr("action") + "/rating:" + rating;
				ui.$form.attr("action", url);		
		        ui.$form.submit();
		    }
		});
		
	});
</script>
