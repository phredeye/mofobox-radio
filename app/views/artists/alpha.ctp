<div class="artist_control grid_16">
	
	<div class="title corner">
		<h3>Artists</h3>
	</div>
	
	<div id="alpha_pager">
		<?php echo $this->AlphaPager->display($alpha); ?>
	</div>
	<div class="clear"></div>
	
	<div class="paging corner">
		<?php echo $this->Paginator->prev(__('previous', true), array(), null, array('class'=>'disabled'));?>
	 	&nbsp;|&nbsp;
		<?php echo $this->Paginator->numbers();?>
		&nbsp;|&nbsp;
		<?php echo $this->Paginator->next(__('next', true), array(), null, array('class' => 'disabled'));?>
	</div>
	<div class="clear"></div>

	<div id="artist_grid">
	<?php if(!empty($artists)): ?>
	<?php $i = 1; ?>
	<?php foreach ($artists as $artist): ?>
		<div class="album_grid corner">
		    <div class="small_cover">
		        <a href="/artists/view/<?php echo $artist["Artist"]["id"] ?>">
					<?php
					 $img = "llama.png";
					 $alt = "Sorry, there is no album art for this artist. So have a llama.";
					
					 if(isset($artist["Artist"]["AlbumArt"]["medium_image"])) {
						$img = $artist["Artist"]["AlbumArt"]["medium_image"];
						$alt = $artist["Artist"]["name"];
					 }
					 echo $this->Html->image($img, array("alt" => $alt, "title" => $alt)); 
					?>
		        </a>
				<div class="clear"></div>
		    </div>
			<div class="clear"></div>
			<div>
				<?php 
					echo $this->Html->link($artist["Artist"]["name"], array(
						"action" => "view",
						$artist["Artist"]["id"] 
					));
				 ?>
			</div>
		</div>
		<?php if($i++ % 5 == 0): ?>
			<div class="clear"></div>
		<?php endif; ?>
	<?php endforeach; ?>
	<?php else: ?>
		<div style="text-align:center;padding:40px;">
			<h3>No Artists</h3>
		</div>
	<?php endif; ?>
	</div>
	<div class="clear"></div>	
	
	<!-- Bottom Pager -->
	<div class="paging corner">
		<?php echo $this->Paginator->prev("previous", array(), null, array('class'=>'disabled'));?>
	 	&nbsp;|&nbsp; 	
		<?php echo $this->Paginator->numbers();?>
 		&nbsp;|&nbsp;
		<?php echo $this->Paginator->next("next", array(), null, array('class' => 'disabled'));?>
	</div>
</div>


