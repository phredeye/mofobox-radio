<?php
/* TrackVote Fixture generated on: 2011-02-17 01:15:28 : 1297905328 */
class TrackVoteFixture extends CakeTestFixture {
	var $name = 'TrackVote';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'track_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'stars' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_track_votes_track_track_id' => array('column' => 'track_id', 'unique' => 0), 'fk_track_votes_user_user_id' => array('column' => 'user_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'track_id' => 1,
			'user_id' => 1,
			'stars' => 1,
			'created' => '2011-02-17 01:15:28',
			'modified' => '2011-02-17 01:15:28'
		),
	);
}
?>