<?php
class PlaylistController extends AppController {

	public $name = 'Playlist';

	public $uses = array("Playlist", "Track");
	
	public $components = array("JsonResponse", "Session");
	
	function stream() {
		$this->layout = false;
		header("Content-type: audio/x-scpls");
		
	}

	function index() {
		$this->Playlist->recursive = 0;
		$this->set('playlists', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid playlist', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('playlist', $this->Playlist->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Playlist->create();
			if ($this->Playlist->save($this->data)) {
				$this->Session->setFlash(__('The playlist has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The playlist could not be saved. Please, try again.', true));
			}
		}
		$tracks = $this->Playlist->Track->find('list');
		$users = $this->Playlist->User->find('list');
		$this->set(compact('tracks', 'users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid playlist', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Playlist->save($this->data)) {
				$this->Session->setFlash(__('The playlist has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The playlist could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Playlist->read(null, $id);
		}
		$tracks = $this->Playlist->Track->find('list');
		$users = $this->Playlist->User->find('list');
		$this->set(compact('tracks', 'users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for playlist', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Playlist->delete($id)) {
			$this->Session->setFlash(__('Playlist deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Playlist was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	public function played() {
		$playlist = $this->Playlist->getPlayedEntries(3);
		$this->set("playlist", $playlist);	
	}
	
	public function pending() {
		
		$playlist = $this->Playlist->getPending(6);
		$this->set("playlist", $playlist);
		
	}
	
	public function now_playing() {
		$playlist = $this->Playlist->getNowPlaying();
		$this->set("playlist", $playlist);
	}
	
	public function enqueue($id) {

		$track = $this->Track->read(null, $id);
		
		if(!$this->Playlist->trackIsInQueue($id)) {
			if($this->Playlist->enqueue($id)) {
				$this->JsonResponse->isSuccess(true);
				$this->JsonResponse->addMessage(sprintf(
					"Track: %s was added to the playlist queue.", $track["Track"]["title"]
					));
			}
		} else {
			$this->JsonResponse->addError(sprintf(
				"Track '%s' is already in queue", $track["Track"]["title"]
				));
			
		}
		
		echo $this->JsonResponse->encode();
		exit();
	}
}
?>