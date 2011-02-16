<?php

class MetaDataTask extends Shell {
	
	public $uses = array("Playlist");
	
	public function execute() 
	{
		$entry = $this->Playlist->getNowPlaying();

		$cmd = false;
		if(count($this->args) > 0) {
			$cmd = $this->args[0];
		}
		
		switch($cmd) {
			case 'artist':
				echo $entry["Track"]["Artist"]["name"];
				break;
			case 'album':
				echo $entry["Track"]["Album"]["title"];
				break;
			case 'title':
				echo $entry["Track"]["title"];
				break;
			default:
				echo "MofoBox Radio";
				break;
		}
		
		echo "\n";

	}
	
	public function startup() {
		// do nothing
	}
}