<?php
/* Playlists Test cases generated on: 2011-02-14 00:16:57 : 1297642617*/
App::import('Controller', 'Playlists');

class TestPlaylistsController extends PlaylistsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class PlaylistsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.playlist', 'app.track', 'app.album', 'app.artist', 'app.user', 'app.artists_track', 'app.albums_track');

	function startTest() {
		$this->Playlists =& new TestPlaylistsController();
		$this->Playlists->constructClasses();
	}

	function endTest() {
		unset($this->Playlists);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
?>