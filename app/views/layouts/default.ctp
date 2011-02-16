<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <title>MofoBox Radio :: <?php echo $title_for_layout; ?></title>
  
  <?php 
	echo $this->Html->script(array(
		"jquery-1.3.2.min",
		"jquery.corner"
		));
		
	echo $this->Html->css(array(
		"reset",
		"text",
		"grid",
		"styles",
		"generic"
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
	                <h1>Mofobox Radio</h1>
	        </div>
	        <div class="grid_8">
				<div id="identity">
					Hello, Mofo
	                &nbsp;|&nbsp;
	                <a href="/user/logout">logout</a>
	                &nbsp;|&nbsp;
	                <a href="/user/myprofile">my profile</a>
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
					echo $this->Html->link("listen", sprintf("%s.pls", Configure::read("Mofobox.StreamURL"))); 
				?>
				</li>
            </ul>
    		<div class="clear"></div>
    </div>        
    <div class="clear"></div>
    <div id="content">
            <?php echo $this->Session->flash(); ?>
            <?php echo $content_for_layout ?>
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

