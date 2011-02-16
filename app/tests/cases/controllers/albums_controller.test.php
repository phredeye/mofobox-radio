<?php
/* Albums Test cases generated on: 2011-02-14 05:30:14 : 1297661414*/
App::import('Controller', 'Albums');

class TestAlbumsController extends AlbumsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class AlbumsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.album', 'app.track', 'app.artist', 'app.playlist', 'app.user');

	function startTest() {
		$this->Albums =& new TestAlbumsController();
		$this->Albums->constructClasses();
	}

	function endTest() {
		unset($this->Albums);
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