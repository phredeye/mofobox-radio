<div class="grid_5">
	<?php echo $this->Theme->boxTop("Now Playing") ?>
		<div id="now-playing" style="height:330px;"></div>
	<?php echo $this->Theme->boxEnd(); ?>
</div>

<div class="grid_11">
	<?php echo $this->Theme->boxTop("Recently Played") ?>
		<div id="recently-played" style="height:280px;"></div>
	<?php echo $this->Theme->boxEnd(); ?>	
</div>

<div class="grid_11">
	<?php echo $this->Theme->boxTop("Playing Soon") ?>  
		<div id="playing-soon" style="height:560px;"></div>
	<?php echo $this->Theme->boxEnd(); ?>
</div>
<div class="clear"></div>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        
       function loadNowPlaying() { 
			
			var $loadingImage = $("<img/>")
				.attr("src", "/img/ajax-loader.gif")
				.css("position","relative")
				.css("top",20)
				.css("left", 20)
				.css("z-index", "100")
				.attr("id", "now-playing-loading-image");
			
			var $el = $("#now-playing");
			$el.children("div").remove();
			$el.append($loadingImage);
			
			setTimeout(function() { 
				$el.load("/playlist/now_playing", function(response) {			
					$("#now-playing-loading-image").remove();
				});
			}, 1000);
        };

		function loadRecentlyPlayed() {
			var $loadingImage = $("<img/>")
				.attr("src", "/img/ajax-loader.gif")
				.css("position","relative")
				.css("top",20)
				.css("left", 20)
				.css("z-index", "100")
				.attr("id", "recently-played-loading-image");

			var $el = $("#recently-played");
			$el.children("div").remove();
			$el.append($loadingImage);
					
			setTimeout(function() {
				$el.load("/playlist/played", function() {
					$("#recently-played-loading-image").remove();
				});
			}, 1000);
		}
		
		
		function loadPending() {
			console.log("Loading pending...");
			var $loadingImage = $("<img/>")
				.attr("src", "/img/ajax-loader.gif")
				.css("position","relative")
				.css("top", 20)
				.css("left", 20)
				.css("z-index", "100")
				.attr("id", "playing-soon-loading-image");

			var $el = $("#playing-soon");
			$el.children("div").remove();
			$el.append($loadingImage);
			
			setTimeout(function() {
				$el.load("/playlist/pending", function() {
					$("#playing-soon-loading-image").remove();
				});
			}, 1000);
		
		}
		
		function loadAll() {
			loadNowPlaying(); 
			loadRecentlyPlayed();
			loadPending();	
		}
		
		setInterval(loadAll, 15000);

		loadAll();

    });
    
    
</script>
