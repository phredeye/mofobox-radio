<?php
/* Album Test cases generated on: 2011-02-14 05:30:13 : 1297661413*/
App::import('Model', 'Album');

class AlbumTestCase extends CakeTestCase {
	var $fixtures = array('app.album', 'app.track', 'app.artist', 'app.playlist', 'app.user');

	function startTest() {
		$this->Album =& ClassRegistry::init('Album');
	}

	function endTest() {
		unset($this->Album);
		ClassRegistry::flush();
	}

}
?>