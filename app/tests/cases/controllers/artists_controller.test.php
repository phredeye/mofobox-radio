<?php
/* Artists Test cases generated on: 2011-02-14 05:25:29 : 1297661129*/
App::import('Controller', 'Artists');

class TestArtistsController extends ArtistsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ArtistsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.artist', 'app.track');

	function startTest() {
		$this->Artists =& new TestArtistsController();
		$this->Artists->constructClasses();
	}

	function endTest() {
		unset($this->Artists);
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