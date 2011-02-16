<?php
/* Playlist Fixture generated on: 2011-02-14 00:16:57 : 1297642617 */
class PlaylistFixture extends CakeTestFixture {
	var $name = 'Playlist';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'track_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'played' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'track_id_idx' => array('column' => 'track_id', 'unique' => 0), 'user_id_idx' => array('column' => 'user_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'track_id' => 1,
			'user_id' => 1,
			'played' => 1,
			'created' => '2011-02-14 00:16:57',
			'modified' => '2011-02-14 00:16:57'
		),
	);
}
?>