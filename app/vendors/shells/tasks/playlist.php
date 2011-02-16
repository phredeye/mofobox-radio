<?php

class PlaylistTask extends Shell {
	
	public $uses = array("Playlist", "Track");
	
	public function execute() 
	{
		$entry =  $this->Playlist->getNextTrack();
		
		if(empty($entry)) {
			for($i = 0; $i < 7; $i++) {
				$this->Playlist->enqueueRandom();
			}
			$entry = $this->Playlist->getNextTrack();
		}
		
		$entry["Playlist"]["played"] = true;
		$this->Playlist->save($entry);
		
		echo $entry["Track"]["filename"];
	}
	
	/**
	* @override we dont want that nasty welcome message
	*/
	public function startup() {
		// do nothing
	}
}

?>