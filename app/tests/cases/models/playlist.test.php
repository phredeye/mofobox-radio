<?php
/* Playlist Test cases generated on: 2011-02-14 00:16:57 : 1297642617*/
App::import('Model', 'Playlist');

class PlaylistTestCase extends CakeTestCase {
	var $fixtures = array('app.playlist', 'app.track', 'app.album', 'app.artist', 'app.user', 'app.artists_track', 'app.albums_track');

	function startTest() {
		$this->Playlist =& ClassRegistry::init('Playlist');
	}

	function endTest() {
		unset($this->Playlist);
		ClassRegistry::flush();
	}

}
?>