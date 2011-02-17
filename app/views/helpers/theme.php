<?php

class ThemeHelper extends AppHelper {
	
	public $helpers = array("Html");
	
	public function title($title, $headingSize = 3, $corner = "corner") {
		$heading = sprintf("h%d", $headingSize);
		return $this->Html->div("title $corner", 
			$this->Html->tag($heading, $title)
		);
	}
	
	public function coverArtImage() {
		
	}
	
	public function boxTop($title, $headingSize = 4) {
		
	
		$heading = sprintf("h%d", $headingSize);
		$output = $this->Html->div("box-title corner-top", 
			$this->Html->tag($heading, $title)
		);
		
		$output .= "<div class='box corner-bottom'>";
		return $output;
	}
	
	public function boxEnd() {
		return "</div>";
	}
	
}