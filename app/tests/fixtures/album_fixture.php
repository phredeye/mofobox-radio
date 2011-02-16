<?php
/* Album Fixture generated on: 2011-02-14 05:30:13 : 1297661413 */
class AlbumFixture extends CakeTestFixture {
	var $name = 'Album';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'amazon_asin' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'amazon_detail_page_url' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'amazon_average_rating' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'small_image' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'medium_image' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'large_image' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'genre' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'title' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'year' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'amazon_asin' => 'Lorem ipsum dolor sit amet',
			'amazon_detail_page_url' => 'Lorem ipsum dolor sit amet',
			'amazon_average_rating' => 1,
			'small_image' => 'Lorem ipsum dolor sit amet',
			'medium_image' => 'Lorem ipsum dolor sit amet',
			'large_image' => 'Lorem ipsum dolor sit amet',
			'genre' => 'Lorem ipsum dolor sit amet',
			'title' => 'Lorem ipsum dolor sit amet',
			'year' => 1,
			'created' => '2011-02-14 05:30:13',
			'modified' => '2011-02-14 05:30:13'
		),
	);
}
?>