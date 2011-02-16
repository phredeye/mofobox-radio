<?php
/* Track Test cases generated on: 2011-02-14 05:25:34 : 1297661134*/
App::import('Model', 'Track');

class TrackTestCase extends CakeTestCase {
	var $fixtures = array('app.track', 'app.artist', 'app.album', 'app.playlist', 'app.user');

	function startTest() {
		$this->Track =& ClassRegistry::init('Track');
	}

	function endTest() {
		unset($this->Track);
		ClassRegistry::flush();
	}

}
?>