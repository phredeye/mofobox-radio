<?php

class MofoboxShell extends Shell {
	
	public $tasks = array("Index", "Playlist","MetaData", "Amazon");
	
	public function main() {
		$this->help();
	}
	
	public function help() {
		$this->out("Mofobox Tasks:");
		
		foreach($this->tasks as $task) {
			$this->out(sprintf("-> %s", $task));
		}
	}

}
