<?php
class AlphaPagerHelper extends AppHelper {
	
	public $helpers = array("Html");
	
	public function display($alpha) {
		
		$output = "";
		$letters = array();

	
		for ($i = 65; $i <= 90; $i++) 
		{
		 	$x = chr($i);
			$item = "<span>\n";
			
			$options = array("class" => "corner");
			if($x === strtoupper($alpha)) {
				$options["class"] = "current corner";
			} 
			
			$item .= $this->Html->link($x, 
				array(
					"controller" => "artists",
					"action" => "alpha",
					strtolower($x)
				),
				$options
			);
			$item .= "\n</span>\n";
			
			$output .= $item;
		}
		
		for($i = 0; $i <= 9; $i++) {
			
			$options = array("class" => "corner");
			
			if("{$i}" == $alpha) {
				$options["class"] = "current corner";
			} 
			
			$item = "<span>\n";
			$item .= $this->Html->link($i, 
				array(
					"controller" => "artists",
					"action" => "alpha",
					$i
				),
				$options
			);
			
			$item .= "\n</span>\n";
			
			$output .= $item;
		}
		
		
		return $output;
		
	}
}
?>