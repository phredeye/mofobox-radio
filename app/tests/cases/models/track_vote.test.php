<?php
/* TrackVote Test cases generated on: 2011-02-17 01:15:28 : 1297905328*/
App::import('Model', 'TrackVote');

class TrackVoteTestCase extends CakeTestCase {
	var $fixtures = array('app.track_vote', 'app.track', 'app.artist', 'app.album', 'app.playlist', 'app.user');

	function startTest() {
		$this->TrackVote =& ClassRegistry::init('TrackVote');
	}

	function endTest() {
		unset($this->TrackVote);
		ClassRegistry::flush();
	}

}
?>