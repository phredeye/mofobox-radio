<div class="grid_16">
	<div class="header corner">
		<em>Album Title:</em>
		<br/>
		<h3><?php echo $album["Album"]["title"] ?></h3>
		<em>Artist(s):</em>
		<br/>
		<?php 
		$prevArtists = array();
		foreach($album["Track"] as $track) {
			$name = $track["Artist"]["name"];
			if(!in_array($name, $prevArtists)) {
				$prevArtists[] = $name;
				printf("<h4>%s</h4>", $this->Html->link($name, array(
					"controller" => "artists",
					"action" => "view",
					$track["Artist"]["id"]
				)));
			}
		}
		?>
	</div>
</div>
<div class="clear"></div>


<div style="margin-bottom:20px;">
	<div class="grid_6">

		<?php echo $this->Theme->boxTop("Cover Art") ?>
		<div class="medium_cover corner">
		<?php
		 $img = "llama.png";
		 $alt = "Sorry, there is no album art for this artist. So have a llama.";

		 if(!empty($album["Album"]["large_image"])) {
			$img = $album["Album"]["large_image"];
			$alt = $album["Album"]["title"];
		 }
		 echo $this->Html->image($img, array("alt" => $alt, "title" => $alt)); 
		?>
		</div>
		<?php echo $this->Theme->boxEnd(); ?>
	</div>
	<div class="grid_10">
		<?php echo $this->Theme->boxTop("Tracks"); ?>
		<table border="0" cellspacing="5" cellpadding="5">
			<tr>
				<th>Title</th>
				<th>Length</th>
				<th class="actions">&nbsp;</th>
			</tr>
			<?php foreach($album["Track"] as $track):  ?>
			<tr>
				<td><?php echo $track["title"] ?></td>
				<td><?php echo $track["duration"] ?></td>
				<td class="actions">
					<?php 
						echo $this->Html->link("Request", 
							array(
								"controller" => "playlist",
								"action" => "enqueue",
								$track["id"]
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
						$track["id"]
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
