<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <title>MofoBox Radio :: <?php echo $title_for_layout; ?></title>
  <style type="text/css" media="screen">

	#outer {height: 600px; overflow: hidden; position: relative; width: 100%;}
	#outer[id] {display: table; position: static;}
	
	#middle {position: absolute; top: 50%; width: 100%; text-align: center;} /* for explorer only*/
	#middle[id] {display: table-cell; vertical-align: middle; position: static;}
	
	#inner {position: relative; top: -50%; text-align: left;} /* for explorer only */
	#inner {width: 350px; margin-left: auto; margin-right: auto;} /* for all browsers*/
	/* optional: #inner[id] {position: static;} */

	fieldset { width: 100%; padding:none; margin:none;}
	label { color: #ddd;}
	
  </style>
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
		"generic",
	));
	
	echo $scripts_for_layout;
	
	?>
	
	
	<script>
	    $(document).ready(function() { 

			$(".corner").corner();

			/** hide application errors and notices */
			var $m = $("messages");
			if($m.children().length > 0) {
				var hideMessages = function() {
					
					$m.css("margin-bottom", "20px");
					
					$m.children().slideUp('fast',function() {
						$m.hide();
					});
				}
				
				setTimeout(hideMessages, 4000);
			};
			
	
	
		});
	</script>
	
	

</head> 
<body>

<div id="outer">
	<div id="middle">
		<div id="inner">

	   		<?php echo $this->Html->image("logo.png") ?>

			<div id="messages">
		    	<?php echo $this->Session->flash(); ?>
			</div>
	        <?php echo $content_for_layout ?>
		
		</div>
	</div>
</div>

</body>
</html>

