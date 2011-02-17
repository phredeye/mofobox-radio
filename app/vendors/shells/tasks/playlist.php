<?php

class PlaylistTask extends Shell {
	
	public $uses = array("Playlist", "Track");
	
	public function execute() 
	{
		$entry =  $this->Playlist->getNextTrack();
		
		if(empty($entry)) {
			$this->out("Enqueueing randoms.");
			for($i = 0; $i < 7; $i++) {
				if(!$this->Playlist->enqueueRandom()) {
					$this->err("Error enqueueing random track!");
				}
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