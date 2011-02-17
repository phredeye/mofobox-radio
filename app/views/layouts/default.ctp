<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <title>MofoBox Radio :: <?php echo $title_for_layout; ?></title>
  
  <?php 
	echo $this->Html->script(array(
		"jquery-1.3.2.min",
		"jquery.corner",
		"jquery.jgrowl"
		));
		
	echo $this->Html->css(array(
		"reset",
		"text",
		"grid",
		"styles",
		"generic",
		"jquery.jgrowl"
	));
	
	echo $scripts_for_layout;
	
	?>
	
	
	<script>
	    $(document).ready(function() { 
			$(".corner").corner();
			$(".corner-bottom").corner("bottom");
			$(".corner-top").corner("top");
	    });
	</script>

</head> 
<body>

<div id="container" class="container_16 corner">
    
    <div id="header" class="corner-top">
        	<div id="logo" class="grid_8">
	        	<?php echo $this->Html->image("logo.png", array("style" => "margin-top:20px;")) ?>
	        </div>
	        <div class="grid_8">
				<div id="identity" class="corner">
					<?php if($this->Session->check("Auth.User")): ?>
					Hello, <?php echo $this->Session->read("Auth.User.username"); ?>
	                &nbsp;|&nbsp;
					<?php echo $this->Html->link("logout", "/users/logout"); ?>
	                &nbsp;|&nbsp;
					<?php echo $this->Html->link("my profile", "/users/myprofile") ?>
					<?php endif; ?>
				</div>
	        </div>
	    	<div class="clear"></div>
    </div>
    <div class="clear"></div>

    <div id="nav">
            <ul>
                <li><a href="/">home</a></li>
                <li><?php echo $this->Html->link("artists", "/artists"); ?></li>
				<li>
				<?php 
					echo $this->Html->link("listen", sprintf("%s.m3u", Configure::read("Mofobox.StreamURL"))); 
				?>
				</li>
            </ul>
    		<div class="clear"></div>
    </div>        
    <div class="clear"></div>
    <div id="content">
			<div id="messages">
            	<?php echo $this->Session->flash(); ?>
			</div>
            <?php echo $content_for_layout ?>
			<div class="clear"></div>
    </div>        
	<div class="clear"></div>
	
	<div id="footer">
		<div class="container_16">
			<div id="footer-left" class="grid_8">
				&copy; <?php echo date("Y"); ?> Isaacs Consulting
			</div>
			<div id="footer-right" class="grid_8">
				<?php echo $this->Html->image("cake.power.gif"); ?>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>

</body>
</html>

