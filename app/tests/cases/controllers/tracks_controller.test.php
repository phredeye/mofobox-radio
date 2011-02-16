<?php
/* Tracks Test cases generated on: 2011-02-14 05:25:36 : 1297661136*/
App::import('Controller', 'Tracks');

class TestTracksController extends TracksController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class TracksControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.track', 'app.artist', 'app.album', 'app.playlist', 'app.user');

	function startTest() {
		$this->Tracks =& new TestTracksController();
		$this->Tracks->constructClasses();
	}

	function endTest() {
		unset($this->Tracks);
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