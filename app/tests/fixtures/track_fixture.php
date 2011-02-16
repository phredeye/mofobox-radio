<?php
/* Track Fixture generated on: 2011-02-14 05:25:34 : 1297661134 */
class TrackFixture extends CakeTestFixture {
	var $name = 'Track';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'track_number' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'title' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 150, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'artist_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'album_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'genre' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'year' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'duration' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'filename' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 150, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'tracks_artists_artist_id' => array('column' => 'artist_id', 'unique' => 0), 'tracks_albums_album_id' => array('column' => 'album_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'track_number' => 1,
			'title' => 'Lorem ipsum dolor sit amet',
			'artist_id' => 1,
			'album_id' => 1,
			'genre' => 'Lorem ipsum dolor sit amet',
			'year' => 1,
			'duration' => 1,
			'filename' => 'Lorem ipsum dolor sit amet',
			'created' => '2011-02-14 05:25:34',
			'modified' => '2011-02-14 05:25:34'
		),
	);
}
?>