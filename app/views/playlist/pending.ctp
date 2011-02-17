<div style="padding-left:5px;">
<?php 
$i = 1;
foreach($playlist as $entry): 
?>
<div class="grid_5" style="width:31%;">
	<div class="medium_cover" style="padding:10px;margin-bottom:10px;">
		<?php 
			$image = "llama.png";
			if(!empty($entry["Track"]["Album"]["medium_image"])) {
				$image = $entry["Track"]["Album"]["medium_image"];
			}
			echo $this->Html->image($image); 
			
			
			echo $this->Html->div(null, 
				$this->Html->link($entry["Track"]["Artist"]["name"], array(
					"controller" => "artists",
					"action" => "view",
					$entry["Track"]["Artist"]["id"]
			)));
			
			echo $this->Html->div(null, 
				$this->Html->link($entry["Track"]["Album"]["title"], array(
					"controller" => "albums",
					"action" => "view",
					$entry["Track"]["Album"]["id"]
			)));
			
			echo $this->Html->div(null, 
				$this->Html->link($entry["Track"]["title"], array(
					"controller" => "tracks",
					"action" => "view",
					$entry["Track"]["id"]
			)));
		?>
	</div>
</div>
<?php if(($i % 3) == 0): ?>
	<div class="clear"></div>
<?php 
	endif; 
	$i++;
?>

<?php endforeach; ?>
<div class="clear"></div>
</div>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$(".medium_cover").corner();
	})
</script>