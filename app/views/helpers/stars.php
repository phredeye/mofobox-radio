<?php

class StarsHelper extends AppHelper {
	
	public $helpers = array("Html", "Form");
	
	public function display($passedArgs, $primaryKey, $currentRating) {
		
		$url = am(
			$passedArgs, 
			array(
				'rate' => $primaryKey, 
				'redirect' => true
			)
		);
			
		$options = array(
			"1" => "Terrible",
			"2" => "Poor",
			"3" => "Average",
			"4" => "Great",
			"5" => "I love this. <3"
		);
		
		$output = $this->Form->create(null, array("url" => $url));
		$output .= '<div id="stars-wrapper">';
		$output .= $this->Form->input("rating", array(
			"type"=>"select",
			"name" => "rating",
			"options" => $options, 
			"value" => round($currentRating), 
			"div"=>false, 
			"label" => false
		));
		$output .= "</div>";	
		$output .= $this->Form->end();
		
		
		return $output;
		
	}
}