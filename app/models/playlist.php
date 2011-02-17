<?php
class Playlist extends AppModel {
	var $name = 'Playlist';
	var $validate = array(
		'track_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Track' => array(
			'className' => 'Track',
			'foreignKey' => 'track_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	public function getPlayedEntries($limit = 8) 
	{
		$limit = $limit+1;
		$this->contain("User","Track", "Track.Artist", "Track.Album");
		
		$entries = $this->find('all', array(
			'conditions' => array('Playlist.played' => true),
			'order' => "Playlist.modified DESC",
			'limit' => $limit
		));
		
		array_shift($entries);
		return $entries;	
	}
	
	public function getNowPlaying() 
	{
		$this->contain("User","Track", "Track.Artist", "Track.Album");
		
		$entry = $this->find('all', array(
			'conditions' => array('Playlist.played' => true),
			'order' => "Playlist.modified DESC",
			'limit' => 1
		));
		
		return $entry[0];		
	}
	
	public function getPending($limit = 8)
	{
		$this->contain("User","Track", "Track.Artist", "Track.Album");
		
		$entries = $this->find('all', array(
			'conditions' => array('Playlist.played' => false),
			'order' => "Playlist.created ASC",
			'limit' => $limit
		));
		
		return $entries;
	}
	
	public function getNextTrack() {
		$this->contain("User","Track", "Track.Artist", "Track.Album");
		
		$entry = $this->find('all', array(
			'conditions' => array('Playlist.played' => false),
			'order' => "Playlist.created ASC",
			'limit' => 1
		));
		
		if(empty($entry)) {
			return false;
		}
		return $entry[0];
	}
	
	public function trackIsInQueue($track_id) {
		$count = $this->find('count', array(
			"conditions" => array("track_id" => $track_id, "played" => false)
		));
		if($count > 0) {
			return true;
		}
		return false;
	}
	
	public function enqueue($track_id, $user_id = 0) {
		return $this->save(array("track_id" => $track_id, "user_id" => $user_id));
	}
	
	public function enqueueRandom($user_id = 0) {
		
		// amazon removed the reviews/rankings from their API :(
		$this->Track->contain();
		$track = $this->Track->find('all', array("order" => "RAND()", "limit"=>1));

		$data = $this->create(array(
			"track_id" => $track[0]["Track"]["id"],
			"user_id" => $user_id, 
			"played" => 0
		));
		
		return $this->save($data);
		
	}
}
?>