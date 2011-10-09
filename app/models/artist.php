<?php
class Artist extends AppModel {
	var $name = 'Artist';

    
	var $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Track' => array(
			'className' => 'Track',
			'foreignKey' => 'artist_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	public function getAlbums($id) 
	{
		
		$SQL = <<<SQL
SELECT DISTINCT(Album.id), Album.*
FROM albums Album, tracks Track
WHERE Album.id = Track.album_id
AND Track.artist_id = $id
SQL;

		$albums = $this->query($SQL);
		
		$this->Track->contain();
		foreach($albums as $key => $album) {
			
			$albums[$key]["Tracks"] = $this->Track->find('all', 
					array('conditions' => array('Track.album_id' => $album["Album"]["id"])
				));
			
		}
		
		return $albums;
	}
	
	
	public function getAlbumArt($id) {
		$SQL = <<<SQL
SELECT DISTINCT(Album.title), Album.small_image, Album.medium_image, Album.large_image
FROM tracks Track, albums Album
WHERE 
  Album.id = Track.album_id
AND
  Track.artist_id = $id
LIMIT 1
SQL;
		$albumArt = $this->query($SQL);
		
		$data = array();
		if(!empty($albumArt[0]["Album"])) {
			$data = $albumArt[0]["Album"];
		}
		return $data;
	}

}
?>