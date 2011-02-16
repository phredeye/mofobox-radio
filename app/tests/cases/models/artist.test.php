<?php
/* Artist Test cases generated on: 2011-02-14 05:25:27 : 1297661127*/
App::import('Model', 'Artist');

class ArtistTestCase extends CakeTestCase {
	var $fixtures = array('app.artist', 'app.track');

	function startTest() {
		$this->Artist =& ClassRegistry::init('Artist');
	}

	function endTest() {
		unset($this->Artist);
		ClassRegistry::flush();
	}

}
?>