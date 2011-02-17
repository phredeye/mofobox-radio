
<div class="medium_cover" style="margin-bottom: 10px;">
	<?php 
		$image = "llama.png";
		if(!empty($playlist["Track"]["Album"]["large_image"])) 
		{
			$image = $playlist["Track"]["Album"]["large_image"];
		}
		
		echo $this->Html->image($image);
		echo $this->Html->div(null, 
			"Artist: " . 
			$this->Html->link($playlist["Track"]["Artist"]["name"], array(
				"controller" => "artists",
				"action" => "view",
				$playlist["Track"]["Artist"]["id"]
		)));
		
		echo $this->Html->div(null, 
			"Album: " . 
			$this->Html->link($playlist["Track"]["Album"]["title"], array(
				"controller" => "albums",
				"action" => "view",
				$playlist["Track"]["Album"]["id"]
		)));
		
		echo $this->Html->div(null, 
			"Title: " .
			$this->Html->link($playlist["Track"]["title"], array(
				"controller" => "tracks",
				"action" => "view",
				$playlist["Track"]["id"]
		)));
	?>
</div>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$(".medium_cover").corner();
	});
</script>
